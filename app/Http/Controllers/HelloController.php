<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;


// global $head, $style, $body, $end;
// $head = '<html><Head>';
// $style = <<<EOF
// <style>
// body {font-size:16pt; color:#999; }
// h1 {font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px}
// </style>
// EOF;
// $body = '</head><body>';
// $end = '</body></html>';

// function tag($tag, $txt) {
//     return "<{$tag}>" . $txt . "</{$tag}>";
// }


class HelloController extends Controller
{
    //
    // public function __invoke() {
    //     return <<<EOF
    //     <html>
    //     <head>
    //     <title>Hello</title>
    //     <style>
    //     body {font-size:16pt; color:#999; }
    //     h1 {font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px}
    //     </style>
    //     </head>
    //     <body>
    //         <h1>Single Action</h1>
    //         <p>これは、シングルアクションコントローラーです</p>
    //     </body>
    //     </html>
    //     EOF;

    // }


    // public function index() {
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'hello') . $style . 
    //             $body
    //             . tag('h1', 'Index') . tag('p', 'this is Index page')
    //             . '<a href="/hello/other">go to Other page</a>'
    //             . $end;
    //     return $html;
    // }

    // public function other() {
    //     global $head, $style, $body, $end;

    //     $html = $head . tag('title', 'other') . $style . 
    //             $body
    //             . tag('h1', 'Other') . tag('p', 'this is Other page')
    //             . $end;

    //     return $html;
    // }

    public function index(Request $request, Response $response) {
        
        $html = <<<EOF
        <html>
        <head>
        <title>Index</title>
        <style>
        body {font-size:16pt; color:#999; }
        h1 {font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px}
        </style>
        </head>
        <body>
            <h1>Hello</h1>
            <h3>Request</h3>
            <pre>{$request}</pre>
            <h3>Respone</h3>
            <pre>{$response}</pre>
            <?php echo $request->url(); ?>
        </body>
        </html>
        EOF;

        $response->setContent($html);
        $request->url();
        $request->fullUrl();
        return $response;
    }

}
