<?php

//$generator = new Badcow\LoremIpsum\Generator();
//$paragraphs = $generator->getParagraphs(5);
//echo implode('<p>', $paragraphs);

//echo app_path()."<br/> ";
//echo public_path()."<br/> ";
//echo base_path()."<br/>";
//echo storage_path();

// require the Faker autoloader
require_once base_path().'/vendor/fzaninotto/faker/src/autoload.php';
// alternatively, use another PSR-0 compliant autoloader (like the Symfony2 ClassLoader for instance)

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

// generate data by accessing properties
//echo $faker->name."<br>";
// 'Lucy Cechtelar';
//echo $faker->address."<br/>";
// "426 Jordy Lodge
// Cartwrightshire, SC 88120-6700"
//echo $faker->text;
// Sint velit eveniet. Rerum atque repellat voluptatem quia rerum. Numquam excepturi
// beatae sint laudantium consequatur. Magni occaecati itaque sint et sit tempore. Nesciunt
// amet quidem. Iusto deleniti cum autem ad quia aperiam.
// A consectetur quos aliquam. In iste aliquid et aut similique suscipit. Consequatur qui
// quaerat iste minus hic expedita. Consequuntur error magni et laboriosam. Aut aspernatur
// voluptatem sit aliquam. Dolores voluptatum est.
// Aut molestias et maxime. Fugit autem facilis quos vero. Eius quibusdam possimus est.
// Ea quaerat et quisquam. Deleniti sunt quam. Adipisci consequatur id in occaecati.
// Et sint et. Ut ducimus quod nemo ab voluptatum.

print_r(array_values($faker));
