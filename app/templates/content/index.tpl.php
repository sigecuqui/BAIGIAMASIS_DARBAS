<div class="represent-image">
    <h1 class="title"><?php print $data['title'] ?></h1>
</div>

<section class="container">

    <?php foreach ($data['services'] as $service_title => $service): ?>

        <article class="container-service">
            <div class="service-image <?php print $service['img']; ?>"></div>
            <div class="service-description-container">
                <h3 class="service-title"><?php print $service_title; ?></h3>
                <p><?php print $service['description']; ?></p>
            </div>
        </article>

    <?php endforeach; ?>

</section>

<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2304.219602278379!2d25.335696615460137!3d54.72335198029064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46dd96e7d814e149%3A0xdd7887e198efd4c7!2sSaul%C4%97tekio%20al.%2015%2C%20Vilnius%2010224!5e0!3m2!1slt!2slt!4v1608636911416!5m2!1slt!2slt" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>