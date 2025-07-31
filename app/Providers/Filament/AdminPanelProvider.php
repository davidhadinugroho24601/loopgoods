<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Http\Middleware\RedirectToChatIndex;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Admin\Widgets\TotalRequestsChart;
use App\Filament\Admin\Widgets\StatsOverviewWidget;
use App\Filament\Admin\Widgets\RequestTableWidget;
use App\Filament\Admin\Resources\CategoryResource;
use App\Filament\Admin\Resources\ChatResource;
use App\Filament\Admin\Resources\ItemResource;
use App\Filament\Admin\Resources\RequestResource;
use App\Filament\Admin\Resources\UserResource;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->colors([
                'primary' => '#4EB57C',   // your green
                'danger' => '#E53935',    // softer red for errors
                'info' => '#29B6F6',      // light blue
                'success' => '#66BB6A',   // greenish success (close to your primary but still distinguishable)
                'warning' => '#FFA726',   // orange for warnings
            ])
            // ->brandLogo(asset('images/logo.png'))
            ->brandName('LOOPGOODS')
            ->homeUrl('/')
            ->profile()
            ->discoverResources(in: app_path('Filament/Admin/Resources'), for: 'App\\Filament\\Admin\\Resources')
            ->discoverPages(in: app_path('Filament/Admin/Pages'), for: 'App\\Filament\\Admin\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\\Filament\\Admin\\Widgets')
            ->widgets([
                StatsOverviewWidget::class,
                TotalRequestsChart::class,
                RequestTableWidget::class,
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                RedirectToChatIndex::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
           ->navigationItems([
        NavigationItem::make('dashboard')
            ->label(fn (): string => __('filament-panels::pages/dashboard.title'))
            ->url(fn (): string => Dashboard::getUrl())
            ->isActiveWhen(fn () => request()->routeIs('filament.admin.pages.dashboard'))
            ->icon('heroicon-o-home')
            ,

        NavigationItem::make('Categories')
            ->url('/admin/categories')
            ->icon('heroicon-o-tag')
            ->visible(fn () => auth()->user()?->isAdmin()),

        NavigationItem::make('Items')
            ->url('/admin/items')
            ->icon('heroicon-o-archive-box')
            ,

        NavigationItem::make('Chats')
            ->url('/admin/chats')
            ->icon('heroicon-o-chat-bubble-left-right')
            ,

        NavigationItem::make('Requests')
            ->url('/admin/requests')
            ->icon('heroicon-o-inbox-arrow-down')
            ,

        NavigationItem::make('Users')
            ->url('/admin/users')
            ->icon('heroicon-o-users')
            ->visible(fn () => auth()->user()?->isAdmin()),
    ])


              ;
    }

   
}
