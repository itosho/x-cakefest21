<?php
declare(strict_types=1);

namespace App\Http;

interface ArticleApiInterface
{
    public function item(string $id): array;
}
