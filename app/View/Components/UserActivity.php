<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\Component;

class UserActivity extends Component
{
    /**
     * The user to display activity for
     *
     * @var User
     */
    public $user;

    public $user_activity;

    public $sorted_column = 'created_at';
    public $sorted_direction = 'asc';

    /**
     * Create a new component instance.
     *
     * @param User|null $user
     */
    public function __construct(User $user = null)
    {
        $this->user = $user;
        $urlQuery = Request::capture()->query();
        $user_activity = $user->user_actions();
        $this->sorted_column = isset($urlQuery['col']) ? $urlQuery['col'] : 'created_at';
        $this->sorted_direction = isset($urlQuery['dir']) ? $urlQuery['dir'] : 'asc';
        $user_activity = $user_activity->orderBy($this->sorted_column, $this->sorted_direction);

        // add a secondary sort to keep the activities in order when sorted value and/or datetime is the same
        $user_activity = $user_activity->orderBy('id', $this->sorted_direction);

        $user_activity = $user_activity->paginate(50)->withQueryString();
        $this->user_activity = $user_activity;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-activity');
    }
}
