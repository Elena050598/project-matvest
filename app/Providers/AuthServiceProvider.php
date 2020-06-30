<?php
namespace App\Providers;
use App\article;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];
    public function boot()
    {
        $this->registerPolicies();
        $this->registerArticlePolicies();
    }
    public function registerArticlePolicies()
    {
        Gate::define('create-article', function ($user) {
            return $user->hasAccess(['create-article']);
        });
        Gate::define('update-article', function ($user, article $article) {
            return $user->hasAccess(['update-article']) or $user->id == $article->user_id;
        });
        Gate::define('publish-article', function ($user) {
            return $user->hasAccess(['publish-article']);
        });
        Gate::define('see-all-drafts', function ($user) {
            return $user->inRole('editor');
        });
    }
}
