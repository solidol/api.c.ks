<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use League\CommonMark\GithubFlavoredMarkdownConverter;
use Illuminate\Support\Facades\Storage;

class HelpController extends Controller
{
    public function show_api(string $page)
    {
        $converter = new GithubFlavoredMarkdownConverter([
            'html_input' => 'strip',
            'allow_unsafe_links' => false,
        ]);
        $filePath = "helper_api/$page";
        if (Storage::disk('public')->exists($filePath)) {
            $fileContents = Storage::disk('public')->get($filePath);
        } else {
            abort(404);
        }
        $html = $converter->convert($fileContents);
        return view('helpers.api.show', ['html' => $html]);
    }
}
