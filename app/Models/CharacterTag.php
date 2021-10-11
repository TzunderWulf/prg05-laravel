<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CharacterTag
 *
 * @property int $id
 * @property int $character_id
 * @property int $tag_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterTag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterTag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterTag query()
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterTag whereCharacterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterTag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterTag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterTag whereTagId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CharacterTag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CharacterTag extends Model
{
    use HasFactory;

    protected $table = 'character_tag';

    protected $fillable = ['character_id', 'tag_id'];
}
