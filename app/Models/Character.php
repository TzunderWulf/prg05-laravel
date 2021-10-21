<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Character
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $character_title
 * @property string $description
 * @property string $city
 * @property string $element
 * @property string $birthday
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Character newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Character query()
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCharacterTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereElement($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $title
 * @property string $region
 * @property string $icon
 * @property string $portrait
 * @property int $created_by
 * @property int $status
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character wherePortrait($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Character whereTitle($value)
 */
class Character extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'title', 'description', 'region', 'element', 'birthday',
        'icon', 'portrait', 'user_id'];

    /**
     * The users that belong to the character.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The tags that belong to the character.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * The users that belong to the character.
     */
    public function createdByUser()
    {
        return $this->belongsTo(User::class);
    }
}
