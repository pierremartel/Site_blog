<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Comment;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void

    
    {
        $faker = \Faker\Factory::create('fr_FR');

        // Crée 3 catégorie fake

        for($i = 1; $i <= 3; $i++){
            $category = new Category();
            $category->setTitle($faker->sentence())
                      ->setDescription($faker->paragraph());


            $manager->persist($category);

            // Créer 4 à 6 articles

            for($j = 1; $j <= mt_rand(4,6); $j++){
                $article = new Article();

                $content = '<p>' . join($faker->paragraphs(5), '</p><p>') . '</p>';

                $article->setTitle($faker->sentence())
                        ->setContent($content)
                        ->setImage($faker->imageUrl())
                        ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                        ->setCategory($category);
    
                $manager->persist($article);

                // Mise en place des commentaires fakes
                for($k = 1; $k <= mt_rand(4,10); $k++){
                    $comment = new Comment();
                    $content = '<p>' . join($faker->paragraphs(2), '</p><p>') . '</p>';

                    $now = new \DateTime();
                    $interval = $now->diff($article->getCreatedAt());
                    $days = $interval->days;
                    $minimum = '-' . $days . ' days'; // -100 days (exemple)

                    $comment->setAuthor($faker->name)
                            ->setContent($content) 
                            ->setCreatedAt($faker->dateTimeBetween($minimum))
                            ->setArticle($article);
                            
                    $manager->persist($comment);
                }
            }

        }


        $manager->flush();
    }
}
