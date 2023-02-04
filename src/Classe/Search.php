<?php

namespace App\Classe;

use App\Entity\Category;
use App\Entity\CategoryPrestation;


class Search
{
    # @var string
    public $string;

    # @var Category[]
    public $categories = [];

    # @var CategoryPrestation[]
    public $categoriesPrestation = [];
}