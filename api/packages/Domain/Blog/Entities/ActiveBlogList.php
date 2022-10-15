<?php

namespace Packages\Domain\Blog\Entities;

final class ActiveBlogList {
    /** @var ActiveBlog[] */
    private array $activeBlogList;

    /**
     * @param ActiveBlog[] $blogList
     */
    public function __construct(array $activeBlogList) {
        $this->activeBlogList = $activeBlogList;
    }

    public function add(ActiveBlog $activeBlog): ActiveBlogList {
        $activeBlogList = $this->activeBlogList;
        array_push($activeBlogList, $activeBlog);
        return new ActiveBlogList($activeBlogList);
    }

    public function ofJson(): array {
        $result = [];

        foreach ($this->activeBlogList as $activeBlog) {
            $result[] = $activeBlog->ofJson();
        }

        return $result;
    }
}
