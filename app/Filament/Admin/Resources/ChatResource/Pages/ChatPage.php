<?php

namespace App\Filament\Admin\Resources\ChatResource\Pages;

use App\Filament\Admin\Resources\ChatResource;
use Filament\Resources\Pages\Page;

class ChatPage extends Page
{
    protected static string $resource = ChatResource::class;

    protected static string $view = 'filament.admin.resources.chat-resource.pages.chat-page';
}
