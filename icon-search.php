<section class="doctor-search text-center">
<form action="<?php echo SITEURL;?>doctor-search.php" method="POST" role="search">
        <div class="input-container">
            <div class="shadow-input"></div>
            <button class="input-button-shadow" role="button">
                <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" height="25px" width="30px">
                    <path
                        d="M4 9a5 5 0 1110 0A5 5 0 014 9zm5-7a7 7 0 104.2 12.6.999.999 0 00.093.107l3 3a1 1 0 001.414-1.414l-3-3a.999.999 0 00-.107-.093A7 7 0 009 2z"
                        fill-rule="evenodd" fill="#17202A">
                        <!-- <input type="button" name="submit" value="بحث"> -->
                    </path>
                </svg>
            </button>
            <input type="text" name="search" class="input-search" placeholder="البحث عن دكتور........"
                title="ابحث في الموقع" required>
        </div>
    </form>
</section>
