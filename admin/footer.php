<footer style="
    background:#222;
    color:#ddd;
    padding:30px 0;
    margin-top:40px;
    width:100%;
    clear:both;
">

    <div style="
        width:90%;
        margin:auto;
        display:flex;
        flex-wrap:wrap;
        justify-content:space-between;
    ">

        <!-- Tentang -->
        <div style="width:30%; min-width:250px;">
            <h3 style="color:white;">My Blog</h3>
            <p>
                Blog dinamis yang menyediakan berbagai artikel menarik 
                dengan fitur kategori, tag, dan komentar pengguna.
            </p>
        </div>

        <!-- Menu -->
        <div style="width:30%; min-width:200px;">
            <h4 style="color:white;">Menu</h4>
            <ul style="list-style:none; padding:0;">
                <li><a href="index.php" style="color:#ddd; text-decoration:none;">Home</a></li>
                <li><a href="index.php?menu=artikel" style="color:#ddd; text-decoration:none;">Artikel</a></li>
                <li><a href="index.php?menu=login" style="color:#ddd; text-decoration:none;">Login</a></li>
            </ul>
        </div>

        <!-- Fitur -->
        <div style="width:30%; min-width:200px;">
            <h4 style="color:white;">Fitur</h4>
            <ul style="list-style:none; padding:0;">
                <li>✔ CRUD Artikel</li>
                <li>✔ Kategori & Tag</li>
                <li>✔ Komentar Pengguna</li>
                <li>✔ Login Admin & Author</li>
            </ul>
        </div>

    </div>

    <!-- Copyright -->
    <div style="
        text-align:center;
        margin-top:20px;
        border-top:1px solid #444;
        padding-top:15px;
    ">
        <p>&copy; <?php echo date("Y"); ?> My Blog. All Rights Reserved.</p>
    </div>

</footer>