<?php

namespace App\Factory;

use App\Entity\Article;

use App\Repository\ArticleRepository;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @method static Article|Proxy createOne(array $attributes = [])
 * @method static Article[]|Proxy[] createMany(int $number, $attributes = [])
 * @method static Article|Proxy find($criteria)
 * @method static Article|Proxy findOrCreate(array $attributes)
 * @method static Article|Proxy first(string $sortedField = 'id')
 * @method static Article|Proxy last(string $sortedField = 'id')
 * @method static Article|Proxy random(array $attributes = [])
 * @method static Article|Proxy randomOrCreate(array $attributes = [])
 * @method static Article[]|Proxy[] all()
 * @method static Article[]|Proxy[] findBy(array $attributes)
 * @method static Article[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Article[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static ArticleRepository|RepositoryProxy repository()
 * @method Article|Proxy create($attributes = [])
 */
final class ArticleFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getDefaults(): array
    {
        $user = UserFactory::createOne();
        return [
            'name' => self::faker()->realText(10),
            'ArticleBody' => self::faker()->paragraph(
                self::faker()->numberBetween(1, 4),
                true
            ),
            'PublishedAt' => self::faker()->dateTimeBetween('-100 days', '-1 minute'),
            'author' => $user,
        ];
    }

    protected function initialize(): self
    {
        // see https://github.com/zenstruck/foundry#initialization
        return $this
            // ->afterInstantiate(function(Article $article) {})
        ;
    }

    protected static function getClass(): string
    {
        return Article::class;
    }
}
