Test Laravel application for IQnection

- Includes Laravel Fortify user authentication
- Includes Laravel Jetstream user management
- Design uses StartBootstrap free dashboard theme


## Watermark Application
Requires directories to be made in the public directory

- public/uploads
- public/uploads/watermarkedImages
- public/uploads/watermarks


## Factory Usage
Add (100) new users to database 
1. php artisan tinker
2. User::factory()->count(100)->create(); 

