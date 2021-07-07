<?php

namespace App\View\Components;

use Illuminate\Http\Request;
use Illuminate\View\Component;

class SortableHeader extends Component
{
    public $sort_by;

    public $sorted_column;

    public $sorted_direction;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($sortBy, $sortedColumn = 'created_at', $sortedDirection = 'asc')
    {
        $this->sort_by = $sortBy;
        $this->sorted_column = $sortedColumn;
        $this->sorted_direction = $sortedDirection;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sortable-header');
    }

    public function sorting_classes()
    {
        $classes = [];
        if ($this->sort_by)
        {
            $classes[] = 'sorting';
            if ($this->isSortedColumn())
            {
                $classes[] = 'sorting_'.strtolower($this->sorted_direction);
            }
        }
        return implode(' ', $classes);
    }

    public function isSortedColumn()
    {
        return (($this->sort_by) && ($this->sort_by == $this->sorted_column));
    }

    public function sort_link()
    {
        if ($this->sort_by)
        {
            $req = Request::capture();
            $query = $req->query();
            $query['col'] = $this->sort_by;
            $query['dir'] = 'asc';
            if ($this->isSortedColumn())
            {
                $query['dir'] = 'desc';
            }
            return $req->path().'?'.http_build_query($query);
        }
    }
}
