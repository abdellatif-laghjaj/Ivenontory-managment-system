<h1>Products</h1>
<hr color="#FF304F" width="90%" size="4">
<div class="products-container">
    <div class="legend" id="legend">
        Add a product
        <button class="arrow" id="arrow" onclick="dropDown()"></button>
    </div>
    <div class="form" id="form">
        <div class="field">
            <span class="label">Product ID</span>
            <input type="text" name="product-id" value="123" disabled>
        </div>
        <div class="field">
            <span class="label">Name</span>
            <input type="text" name="product-name" placeholder="e.g: HP EliteBook">
        </div>
        <div class="field">
            <span class="label">Category</span>
            <select name="category" id="category">
                <option value="1">Laptops</option>
            </select>
        </div>
        <div class="field">
            <span class="label">Quantity</span>
            <input type="number" name="Quantity" placeholder="e.g: 10">
        </div>
        <div class="field">
            <span class="label">Sale price</span>
            <input type="number" name="Sale-price" placeholder="e.g: 59">
        </div>
        <div class="field">
            <span class="label">Buy price</span>
            <input type="number" name="Buy-price" placeholder="e.g: 42">
        </div>
        <div class="field">
            <span class="label">Image</span>
            <input type="file" name="image" value="" accept="image/*">
        </div>
        <div class="ActionButtons">
            <input type="reset" value="RESET" class="reset">
            <input type="submit" value="ADD" class="submit">
        </div>
    </div>
    <!------------------------------------>
    <div class="legend" id="legend1">
        List of products
        <button class="arrow" id="arrow1" onclick="dropDown2()"></button>
    </div>

    <div class="list" id="form1">

        <div class="wrap">
            <div class="search">
                <input type="text" name="search_bar" class="searchTerm" placeholder="Search. . .">
                <button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>

        <table id="customers">
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>4</td>
                <td>IPhone 12</td>
                <td>Mobile</td>
                <td>1</td>
                <td>1499</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Lenovo</td>
                <td>Laptops</td>
                <td>1</td>
                <td>3488</td>
            </tr>
        </table>
    </div>
</div>