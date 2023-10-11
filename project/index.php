<?php



include "../admin/includes/header.php";
include "navigation.php";

if ($_SESSION['user_role'] != "superadmin") {
    header("Location: ../admin ");
} 
?>


<main class="container-fluid px-0 g-pt-65">
    <div class="row no-gutters g-pos-rel g-overflow-x-hidden">

        <?php include "menu.php" ?>

        <div class="col g-ml-45 g-ml-0--lg ">

            <div class="g-bg-lightblue-v10-opacity-0_5 g-pa-20" style="display: flex; justify-content: center; align-items: center; height: 100%;">
                <img id="bouncingImage" src="../admin\img\wefixnet1.png" style="height: 300px" />
            </div>
        </div>
    </div>
</main>


<?php include "../admin/includes/footer.php" ?>

<script>
    const image = document.getElementById('bouncingImage');
    const container = document.querySelector('.container-fluid');

    const bounceSpeed = 0.5; // Adjust the speed of the bounce
    const bounceHeight = 150; // Adjust the height of the bounce

    let direction = 1;
    let currentHeight = 0;

    function animateBounce() {
        currentHeight += direction * bounceSpeed;

        if (currentHeight <= 0) {
            direction = 1;
        }

        if (currentHeight >= bounceHeight) {
            direction = -1;
        }

        image.style.transform = `translateY(${currentHeight}px)`;
        requestAnimationFrame(animateBounce);
    }

    animateBounce();
</script>