<h1>Category</h1>
<hr color="#FF304F" width="90%" size="4">
<div class="container">
    <div class="legend" id="legend">
        Add a new category
        <button class="arrow" id="arrow" onclick="dropDown()"></button>
    </div>
    <div class="form" id="form">
        <div class="field">
            <span class="label">Category ID</span>
            <input type="text" name="product-id" value="123">
        </div>
        <div class="field">
            <span class="label">Name</span>
            <input type="text" name="product-name" value="HP EliteBook">
        </div>
        <div class="ActionButtons">
            <input type="reset" value="RESET" class="reset">
            <input type="submit" value="ADD" class="submit">
        </div>
    </div>
    <!------------------------------------>
    <div class="legend" id="legend1">
        List of categories
        <button class="arrow" id="arrow1" onclick="dropDown2()"></button>
    </div>
    <div class="list" id="form1">
        <table id="customers">
            <tr>
                <th>Category ID</th>
                <th>Name</th>
                <th>N° products</th>
                <th>Quantity</th>
            </tr>
            <tr>
                <td>4</td>
                <td>Mobiles</td>
                <td>7</td>
                <td>81</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Laptops</td>
                <td>3</td>
                <td>25</td>
            </tr>
        </table>
    </div>
</div>