<?php

declare(strict_types=1);

namespace KaamelottGifboard\Action\Xhr;

use KaamelottGifboard\Action\AbstractAction;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchQuotes extends AbstractAction
{
    public function __invoke(Request $request): Response
    {
        if (!$request->isXmlHttpRequest()) {
            return new Response(null, Response::HTTP_NOT_FOUND);
        }

        $gifs = $this->finder->findGifsByQuote(
            (string) $request->query->get('search', '')
        );

        return $this->render('includes/list-items.html.twig', ['gifs' => $gifs]);
    }
}
