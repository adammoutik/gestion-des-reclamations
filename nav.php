<?php
    session_start();
?>

<header>
    <div class="navbar">      
            <a href="http://localhost/hotel/index.php" ><img class="logoname" src="ressources/kenzitowerhotel-scroll.svg" width="30px"/></a>
            </div>
            <ul class="hh">
                <?php 
                    echo "<li><a href='listP.php'>List Global</a></li>";
                    if($_SESSION['username'] == "admin"){
                        echo "<li><a href='admin.php'>Panel</a></li>";
                    }elseif($_SESSION['dep'] != "IT")
                    {
                        echo "<li><a href='addRec.php'>Reclamer</a></li>";
                    }else{
                        echo "<li><a href='inbox.php'>Inbox</a></li>";
                    }
                    
                ?>
                    
                    
                    
            </ul>
            <?php
                    echo "<a href='logout.php' target='_self' ><button class='nav-btn' >Signout</button></a></div>";

            ?>
</div>
</header>

<script>
        type="text/javascript">
    window.addEventListener("scroll",function(){
        var header =document.querySelector("header");
        header.classList.toggle("sticky",window.scrollY > 0)
    })

</script>

<style>
.nav-btn {
    border: none;
    outline: none;
    padding: 7px 14px;
    margin-left: -6px;
    border-radius: 50px;
    background: rgb(29,29,30);
    box-shadow: 0px 0px 0px rgba(0,0,0,.5), inset 0px;
    cursor: pointer;
    color: #fff;
    font-family: 'Bebas Neue';
    font-weight: bold;
    width: 100px;
    height: 40px;
    transition: all ease 0.7s ;
}

.nav-btn:hover {
    outline: 1px solid #fff;
    transform: scale(1.05);
}
</style>