<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use AshAllenDesign\ShortURL\Classes\Resolver;
use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    public function __invoke(Request $request, Resolver $resolver, string $shortURLKey): RedirectResponse
    {
        $shortURL = ShortURL::where('url_key', $shortURLKey)->firstOrFail();

        $resolver->handleVisit(request(), $shortURL);

        if ($shortURL->forward_query_params) {
            return redirect($this->forwardQueryParams($request, $shortURL), $shortURL->redirect_status_code);
        }

        return redirect($shortURL->destination_url, $shortURL->redirect_status_code);
    }
}
