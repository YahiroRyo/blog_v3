<?php

namespace Packages\Domain\Blog\Entities;

final class BlogList {
    /** @var Blog[] */
    private array $blogList;

    /**
     * @param Blog[] $blogList
     */
    public function __construct(array $blogList) {
        $this->blogList = $blogList;
    }

    public function add(Blog $blog): BlogList {
        $blogList = $this->blogList;
        array_push($blogList, $blog);
        return new BlogList($blogList);
    }

    public function ofJson(): array {
        $result = [];

        foreach ($this->blogList as $blog) {
            $result[] = $blog->ofJson();
        }

        return $result;
    }
}
