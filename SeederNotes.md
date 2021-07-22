# Seeder notes

- $table->id();
- $table->string('name');
- $table->string('email')->unique();
- $table->timestamp('email_verified_at')->nullable();
- $table->string('password');
- $table->rememberToken();
- $table->foreignId('current_team_id')->nullable();
- $table->text('profile_photo_path')->nullable();
- $table->timestamps();