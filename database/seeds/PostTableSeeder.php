<?php

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            'name' => 'News',
        ]);

        $author1 = App\User::create([
            'name' => 'John Doe',
            'email' => 'john@dore.com',
            'password' => Hash::make('password')
        ]);

        $author2 = App\User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@dore.com',
            'password' => Hash::make('password')
        ]);

        $category2 = Category::create([
            'name' => 'Design',
        ]);

        $category3 = Category::create([
            'name' => 'Partneship',
        ]);

        $category4 = Category::create([
            'name' => 'Hiring',
        ]);

        $category5 = Category::create([
            'name' => 'Updates',
        ]);

        $category6 = Category::create([
            'name' => 'Marketing',
        ]);

        $category7 = Category::create([
            'name' => 'Product',
        ]);

        $category8 = Category::create([
            'name' => 'Offers',
        ]);

        $post1 = Post::create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg',
            'user_id' => $author1->id
        ]);

        $post2 = $author2->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category6->id,
            'image' => 'posts/2.jpg',
        ]);

        $post3 = $author1->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category2->id,
            'image' => 'posts/3.jpg'
        ]);

        $post4 =  $author1->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category4->id,
            'image' => 'posts/4.jpg'
        ]);

        $post5 =  $author1->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category7->id,
            'image' => 'posts/5.jpg'
        ]);

        $post6 =  $author2->posts()->create([
            'title' => 'This is why it\'s time to ditch dress codes at work',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'category_id' => $category3->id,
            'image' => 'posts/6.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'Record',
        ]);

        $tag2 = Tag::create([
            'name' => 'Progress',
        ]);

        $tag3 = Tag::create([
            'name' => 'Customers',
        ]);

        $tag4 = Tag::create([
            'name' => 'Freebie',
        ]);

        $tag5 = Tag::create([
            'name' => 'Offer',
        ]);

        $tag6 = Tag::create([
            'name' => 'Screenshot',
        ]);

        $tag7 = Tag::create([
            'name' => 'Milestone',
        ]);

        $tag8 = Tag::create([
            'name' => 'Version',
        ]);

        $tag9 = Tag::create([
            'name' => 'Design',
        ]);

        $tag10 = Tag::create([
            'name' => 'Customers',
        ]);

        $tag8 = Tag::create([
            'name' => 'Job',
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag4->id, $tag5->id]);
    }
}
