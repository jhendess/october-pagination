<?php

namespace Jhendess\Pagination\Components;

use Cms\Classes\ComponentBase;

class AutoPaginate extends ComponentBase {

    /**
     * Returns information about this component, including name and description.
     */
    public function componentDetails() {
        return [
            'separator' => [
                'title' => 'Separator',
                'description' => 'The separator which will be used for determining a pagebreak',
                'default' => "<!--PAGEBREAK-->",
                'type' => 'string',
                'validationPattern' => '^\<\!--[a-Z]+--\>$',
                'validationMessage' => 'The separator should be an HTML comment consisting of only letters (e.g. <!--PAGEBREAK-->)'
            ]
        ];
    }

    public function render($staticPage) {
        $currentPage = input("page", 1);
        $content = $staticPage->content();
        $pages = explode($this->property("separator", "<!--PAGEBREAK-->"), $content);
        $maxPages = sizeof($pages);

        if ($currentPage <= 0) {
            $currentPage = 1;
        } elseif ($currentPage > $maxPages) {
            $currentPage = $maxPages;
        }

        $currentPageContent = $pages[$currentPage - 1];
        $pageLinks = $this->generatePageLinks(\Request::path(), $currentPage, $maxPages);

        $nextPage = ($currentPage < $maxPages) ? $pageLinks[$currentPage] : null;
        $previousPage = ($currentPage > 1) ? $pageLinks[$currentPage - 2] : null;

        $result = $this->renderPartial("@pagination.htm", [
            "content" => $currentPageContent,
            "currentPage" => $currentPage,
            "maxPages" => $maxPages,
            "pageLinks" => $pageLinks,
            "nextPage" => $nextPage["link"],
            "previousPage" => $previousPage["link"]
        ]);

        return $result;
    }

    private function generatePageLinks($path, $currentPage, $maxPages) {
        $pageLinks = [];
        for ($i = 1; $i <= $maxPages; $i++) {
            $pageLinks[] = [
                "link" => $path . "?page=" . $i,
                "pageNumber" => $i
            ];
        }
        return $pageLinks;
    }
}