app.factory("DataService",['$http', '$location',function(){
    // create shopping cart
    var myCart = new shoppingCart("AngularStore");
    // enable PayPal checkoutss
    // note: the second parameter identifies the merchant; in order to use the
    // shopping cart with PayPal, you have to create a merchant account with
    // PayPal. You can do that here:
    // https://www.paypal.com/webapps/mpp/merchant
     myCart.addCheckoutParameters("PayPal", "bernardo.castilho-facilitator@gmail.com");
    // enable Google Wallet checkout
    // note: the second parameter identifies the merchant; in order to use the
    // shopping cart with Google Wallet, you have to create a merchant account with
    // Google. You can do that here:
    // https://developers.google.com/commerce/wallet/digital/training/getting-started/merchant-setup
    myCart.addCheckoutParameters("Google", "500640663394527",
        {
            ship_method_name_1: "UPS Next Day Air",
            ship_method_price_1: "20.00",
            ship_method_currency_1: "USD",
            ship_method_name_2: "UPS Ground",
            ship_method_price_2: "15.00",
            ship_method_currency_2: "USD"
        }
    );
    // return data object with store and cart
    return {cart : myCart};
}]);

app.controller('productsCtrl', function ($scope, $modal, $filter,$routeParams, Data,DataService,$rootScope) {
    $scope.cart = DataService.cart;
    $rootScope.totalpanier = $scope.cart.items.length;
    //alert(DataService.cart);
    // use routing to pick the selected product
    if ($routeParams.productSku != null) {
        $scope.prod = $scope.store.getProduct($routeParams.productSku);
        alert($scope.prod.name);
    }
    Data.get('products').then(function(data){
        $scope.products = data.data;
    });
    Data.get('products/1').then(function(data){
        $scope.productsCommunes = data.data;
    });
    Data.get('boulangeries').then(function(data){
        $scope.boulangeries = data.data;
        $scope.nameSelect ="Zorobabel Lubumbashi";
    });
    $scope.selectBoulangerie = function(idBoul,name){
        $scope.nameSelect = name;
        Data.get('products/'+idBoul).then(function(data){
            $scope.productsCommunes = data.data;
        });
    }

    $scope.saveCommande = function (login,password,latitude,longitude,adresse,totalcmd,items) {
        //alert(JSON.stringify(items));
        var etat_commande = "En cours";
                var idclient = 0;
                c={};
                c.login = login;
                c.password = password;
                Data.post('loginclient', c).then(function (result) {
                    if((result.error === false)){
                        idclient = result.idclient;
                        nom_client= result.nom_complet;
                        cmd={};
                        cmd.idClient= idclient;
                        cmd.total_cmd = totalcmd;
                        cmd.adresse_livraison = adresse;
                        cmd.latitude = latitude;
                        cmd.longitude = longitude;
                        cmd.etat_commande = etat_commande;
                        //cmd.ligne_commande = items;
                        if(adresse.length<10){
                            alert("Veuillez entrer une Adresse de livraison valide pour passer votre commande");
                        }else{
                            Data.post('commandes', cmd).then(function (result) {
                                if(result.status != 'error'){
                                    alert(nom_client+" Votre commande de  "+totalcmd+" a été prise en compte");
                                }else{
                                    alert("Une erreur est survenue,veuillez revoir tous vos champs "+status);
                                }
                            });
                        }
                    }else{
                        alert("Veuillez entrer un login , un mot de passe et une Adresse valide pour passer votre commande");
                    }
                });
    };
});
app.controller('homeCtrl', function ($scope, $modal, $filter,$routeParams, Data,DataService) {
    $scope.array = [
        { name: "hello", last: "world", code: 1 },
    ];
    Data.get('products').then(function(data){
        $scope.products = data.data;

        $scope.product_pub1 = $scope.products[Math.floor (Math.random()*$scope.products.length)];
        $scope.product_pub2 = $scope.products[Math.floor (Math.random()*$scope.products.length)];
    });

});
app.controller('adminCtrl', function ($scope, $modal, $filter,$routeParams, Data,DataService) {

    Data.get('products').then(function(data){
        $scope.products = data.data;
    });
    Data.get('boulangeries').then(function(data){
        $scope.boulangeries= data.data;
    });
    Data.get('chefs').then(function(data){
        $scope.chefs= data.data;
    });
    Data.get('commandes').then(function(data){
        $scope.commandes= data.data;
    });
    Data.get('clients').then(function(data){
        $scope.clients= data.data;
    });
    $scope.saveProduct = function (p) {
        p.status = "Active";
        alert(JSON.stringify(p));
        Data.post('products', p).then(function (result) {
            if(result.status == 'success'){
                alert("Vote produit à été enregistrer");
            }else{
                alert("Une erreur est survenue,veuillez revoir tous vos champs "+status);
            }

        });
    };

});

app.controller('registerCtrl', function ($scope, $modal, $filter,$routeParams, Data) {
    $scope.saveClient = function (client,password1) {
        if(password1!=client.password){
            alert("verifier les mot de passe");
        }else{
            Data.post('clients', client).then(function (result) {
                if(result.status != 'error'){
                    alert("Création de compte réussie et maintenant disponible "+status);
                }else{
                    alert("Une erreur est survenue,veuillez revoir tous vos champs "+status);
                }
            });
        }
    };
});

app.controller('productEditCtrl', function ($scope, $modalInstance, item, Data) {
  $scope.product = angular.copy(item);
        $scope.cancel = function () {
            $modalInstance.dismiss('Close');
        };
        $scope.title = (item.id > 0) ? 'Edit Product' : 'Add Product';
        $scope.buttonText = (item.id > 0) ? 'Update Product' : 'Add New Product';

        var original = item;
        $scope.isClean = function() {
            return angular.equals(original, $scope.product);
        }
        $scope.saveProduct = function (product) {
            product.uid = $scope.uid;
            if(product.id > 0){
                Data.put('products/'+product.id, product).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(product);
                        x.save = 'update';
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }else{
                product.status = 'Active';
                Data.post('products', product).then(function (result) {
                    if(result.status != 'error'){
                        var x = angular.copy(product);
                        x.save = 'insert';
                        x.id = result.data;
                        $modalInstance.close(x);
                    }else{
                        console.log(result);
                    }
                });
            }
        };
});
