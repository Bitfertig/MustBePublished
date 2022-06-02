# MustBePublished

<!--
[![Latest Version on Packagist](https://img.shields.io/packagist/v/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/:vendor_slug/:package_slug/run-tests?label=tests)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/:vendor_slug/:package_slug/Check%20&%20fix%20styling?label=code%20style)](https://github.com/:vendor_slug/:package_slug/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/:vendor_slug/:package_slug.svg?style=flat-square)](https://packagist.org/packages/:vendor_slug/:package_slug)
-->

---

Adds "published_at" to a database table. Only published rows will be fetched from database. All unpublished will be ignored. It is the opposit behaviour of SoftDeletes.


## Installation

You can install the package via composer:

<!--
```bash
composer require :vendor_slug/:package_slug
```
-->

```
{
    "require": {
        "bitfertig/mustbepublished": "dev-main",
    },
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/Bitfertig/MustBePublished.git"
        }
    ]
}

```

<!--
You can publish the config file with:
```bash
php artisan vendor:publish --provider="VendorName\Skeleton\SkeletonServiceProvider" --tag=":package_slug-config"
```

This is the contents of the published config file:

```php
return [
];
```
-->

## Usage

```php
return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            ...
            $table->mustBePublished();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function ($table) {
            $table->dropMustBePublished();
        });
    }
};
```

```
class Post extends Model
{
    use MustBePublished;
    ...
}
```

```
Route::get('/posts', function(){

    // Create a unpublished post
    $post = new Post;
    $post->name = "Adam";
    $post->save();
    
    // Create an published post
    $post = new Post;
    $post->name = "Eva";
    $post->save(); // Optional
    $post->publish();
    
    // Publish an created post
    $post->publish();

    // Publish an existing post
    Post::withUnpublished()->find(1)->publish();
    
    // Unpublish a post
    Post::find(1)->unpublish();

});
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [:author_name](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
