<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   
    public function run(): void
    {
  
        User::firstOrCreate(
            ['email' => 'Steve@gmail.com'],
            [
                'name' => 'Steve',
                'password' => bcrypt('12345')
            ]
        );

        $categories = [
            ['name' => 'Fiction', 'description' => 'Fictional novels and stories'],
            ['name' => 'Science', 'description' => 'Scientific and educational books'],
            ['name' => 'History', 'description' => 'Historical books and documentaries'],
            ['name' => 'Technology', 'description' => 'Programming and tech books'],
            ['name' => 'Biography', 'description' => 'Life stories and autobiographies'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                ['description' => $category['description']]
            );
        }

        $fiction = Category::where('name', 'Fiction')->first();
        $science = Category::where('name', 'Science')->first();
        $history = Category::where('name', 'History')->first();
        $technology = Category::where('name', 'Technology')->first();
        $biography = Category::where('name', 'Biography')->first();

        
        $books = [
            [
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'isbn' => '978-0-7432-7356-5',
                'quantity' => 15,
                'price' => 12.99,
                'category_id' => $fiction->id
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'isbn' => '978-0-452-28423-4',
                'quantity' => 20,
                'price' => 14.99,
                'category_id' => $fiction->id
            ],
            [
                'title' => 'A Brief History of Time',
                'author' => 'Stephen Hawking',
                'isbn' => '978-0-553-38016-3',
                'quantity' => 10,
                'price' => 18.99,
                'category_id' => $science->id
            ],
            [
                'title' => 'Sapiens',
                'author' => 'Yuval Noah Harari',
                'isbn' => '978-0-062-31609-7',
                'quantity' => 12,
                'price' => 22.99,
                'category_id' => $history->id
            ],
            [
                'title' => 'Clean Code',
                'author' => 'Robert C. Martin',
                'isbn' => '978-0-132-35088-4',
                'quantity' => 8,
                'price' => 45.99,
                'category_id' => $technology->id
            ],
            [
                'title' => 'Steve Jobs',
                'author' => 'Walter Isaacson',
                'isbn' => '978-1-451-64853-9',
                'quantity' => 6,
                'price' => 16.99,
                'category_id' => $biography->id
            ],
        ];

        foreach ($books as $book) {
            Book::firstOrCreate(
                ['isbn' => $book['isbn']],
                $book
            );
        }

        echo "Database seeded successfully!\n";
        echo "Created 5 categories and 6 books\n";
        echo "User: admin@library.com | Password: password\n";
    }
}