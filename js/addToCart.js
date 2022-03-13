window.onload = function(){
    //add to cart

    const iconShopping = document.querySelector('.basket');
    const cartCloseBtn = document.querySelector('.closebtn');
    const cartBox = document.querySelector('.cart-pop');

    // adding data to localstorage
    const attToCartBtn = document.getElementsByClassName('addToCart');
    let items = [];
    for(let i=0; i<attToCartBtn.length; i++){
        attToCartBtn[i].addEventListener("click",function(e){
            console.log("111");
            if(typeof(Storage) !== 'undefined'){
                let item = {
                    id:i+1,
                    name:e.target.parentElement.querySelector('.product-name').textContent,
                    price:e.target.parentElement.querySelector('.product-price').textContent,
                    no:1
                };
                if(JSON.parse(localStorage.getItem('items')) === null){
                    items.push(item);
                    localStorage.setItem("items",JSON.stringify(items));
                    window.location.reload();
                }else{
                    const localItems = JSON.parse(localStorage.getItem("items"));
                    localItems.map(data=>{
                        if(item.id == data.id){
                            item.no = data.no + 1;
                        }else{
                            items.push(data);
                        }
                    });
                    items.push(item);
                    localStorage.setItem('items',JSON.stringify(items));
                    window.location.reload();
                }
            }else{
                alert('local storage is not working on your browser');
            }
        });

        // adding data to shopping cart
        const iconShoppingP = document.querySelector('.NbOrders');
        let no = 0;
        JSON.parse(localStorage.getItem('items')).map(data=>{
            no = no+data.no
            ;	});
        iconShoppingP.innerHTML = no;


        //adding cartbox data in table
        const cardBoxTable = cartBox.querySelector('table');
        let tableData = '';
        tableData += '<tr><th>S no.</th><th>Item Name</th><th>Item No</th><th>item Price</th><th></th></tr>';
        if(JSON.parse(localStorage.getItem('items'))[0] === null){
            tableData += '<tr><td colspan="5">No items found</td></tr>'
        }else{
            JSON.parse(localStorage.getItem('items')).map(data=>{
                tableData += '<tr><th>'+data.id+'</th><th>'+data.name+'</th><th>'+data.no+'</th><th>'+data.price+'</th><th><a href="#" onclick=Delete(this);>Delete</a></th></tr>';
            });
        }
        cardBoxTable.innerHTML = tableData;
    }
}