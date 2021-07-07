<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Contracts\UpdatesTeamNames;

class UpdateTeamName implements UpdatesTeamNames
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  array  $input
     * @return void
     */
    public function update($user, $team, array $input)
    {
        Gate::forUser($user)->authorize('update', $team);

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
        ])->validateWithBag('updateTeamName');

        $oldTeamName = $team->name;
        $team->forceFill([
            'name' => $input['name'],
        ])->save();

        $user->user_actions()->create([
            'title' => 'Changed Team Name',
            'description' => 'Original team name: '.$oldTeamName.'.<br />New team name: '.$team->name,
            'severity' => 'success'
        ]);
    }
}
