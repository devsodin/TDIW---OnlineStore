<form class="translucid product-form" enctype="multipart/form-data" method="POST" accept-charset="UTF-8" onsubmit="?action=m_products&m=add">
    <br class="user-pass-block">
        <label>Name</label>
        <input type="text" placeholder="Product Name" name="pName" id="pName" required>

        <label>Description</label>
        <input type="text" placeholder="Product Description" name="pDesc" id="pDesc" required>

        <label>Short Description</label>
        <input type="text" placeholder="Product Short Description" name="pSDesc" id="pSDesc" required>

        <label>Price</label>
        <input type="number" min="0" max="99999" placeholder="Product Price" name="pPrice" id="pPrice" required>

    <label>Category</label>
        <select name="pCategory" id="pCategory">
            <option value="1" selected>T-Shirt</option>
            <option value="2">Mobile Cases</option>
            <option value="3">Jewelry</option>
            <option value="4">Hoddies</option>
            <option value="5">Posters</option>
        </select>
        </br>
        <label>Active Product</label>
        <input type="checkbox" placeholder="Product Name" name="pActive" id="pActive">
        </br>
        <label>Image</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000">
        <input type="file"  name="pImage" id="pImage" required>
        </br>
        <button type="submit" name="register-button">Upload Product</button>
</form>


    </div>
