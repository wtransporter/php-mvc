<?php

/**
 * @var \Exception $exception
 */
?>

<section class="page-section" id="error">
    <div class="container" style="margin-top: 100px;">
        <h2 class="text-center mt-0 text-secondary">
            <?php echo $exception->getCode() ?> | <?php echo $exception->getMessage() ?>
        </h2>
        <hr class="divider my-4" />
    </div>
</section>