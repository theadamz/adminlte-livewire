<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models\Config{
/**
 * 
 *
 * @property string $id
 * @property string $user_id
 * @property string $code
 * @property string $permission read,edit,delete,validation,etc
 * @property bool $is_allowed
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access whereIsAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access wherePermission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Access whereUserId($value)
 */
	class Access extends \Eloquent {}
}

namespace App\Models\Config{
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Config\AccessTemplateDetail> $details
 * @property-read int|null $details_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplate whereUpdatedBy($value)
 */
	class AccessTemplate extends \Eloquent {}
}

namespace App\Models\Config{
/**
 * 
 *
 * @property string $id
 * @property string $access_template_id
 * @property string $code
 * @property string $permission read,edit,delete,validation,etc
 * @property bool $is_allowed
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail whereAccessTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail whereIsAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail wherePermission($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|AccessTemplateDetail whereUpdatedBy($value)
 */
	class AccessTemplateDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property string $id
 * @property string $email
 * @property string $name
 * @property string $password
 * @property string $timezone
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $last_change_password_at
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property int $is_active
 * @property string $def_route
 * @property string|null $remember_token
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDefRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastChangePasswordAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedBy($value)
 */
	class User extends \Eloquent implements \Illuminate\Contracts\Auth\MustVerifyEmail {}
}

