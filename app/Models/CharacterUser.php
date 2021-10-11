<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharacterUser
 *
 * @property int $id
 * @property int $character_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterUser whereUserId($value)
 * @mixin \Eloquent
 */
class CharacterUser extends Model
{
    use HasFactory;

    protected $table = 'character_user';
}
