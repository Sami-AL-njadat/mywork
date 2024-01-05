<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'productName' => 'Lux',
            'Sdescription' => 'Short description for Sample Product 1',
            'Ldescription' => 'Long description for Sample Product 1',
            'price' => 5.5,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'uploads/media_65948d2137ada.png',
            'image2' => 'uploads/media_65948d2137ada.png',
            'image3' => 'uploads/media_65948d2137ada.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Samantha',
            'Sdescription' => 'Short description for Sample Product 2',
            'Ldescription' => 'Long description for Sample Product 2',
            'price' => 12,
            'stockqty' => 100,
            'categoryId' => 1, 
            'status' => 'Available',
            'image1' => 'uploads/media_65948d51d5266.jpg',
            'image2' => 'uploads/media_65948d51d5266.jpg',
            'image3' => 'uploads/media_65948d51d5266.jpg',
        ]);
        DB::table('products')->insert([
            'productName' => 'Seerana',
            'Sdescription' => 'Short description for Sample Product 3',
            'Ldescription' => 'Long description for Sample Product 3',
            'price' => 10.5,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'uploads/media_65948cbe32dd8.png',
            'image2' => 'uploads/media_65948cbe32dd8.png',
            'image3' => 'uploads/media_65948cbe32dd8.png',
        ]);
        DB::table('products')->insert([
            'productName' => 'Marushka',
            'Sdescription' => 'Short description for Sample Product 4',
            'Ldescription' => 'Long description for Sample Product 4',
            'price' => 8,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 1, // Replace with an existing category ID
            'image1' => 'uploads/media_65948c45b1ef8.jpg',
            'image2' => 'uploads/media_65948c45b1ef8.jpg',
            'image3' => 'uploads/media_65948c45b1ef8.jpg',
        ]);
        DB::table('products')->insert([
            'productName' => 'Littel',
            'Sdescription' => 'Short description for Sample Product 5',
            'Ldescription' => 'Long description for Sample Product 5',
            'price' => 29,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 1,
            'image1' => 'uploads/media_65948bcc2dcfc.png',
            'image2' => 'uploads/media_65948bcc2dcfc.png',
            'image3' => 'uploads/media_65948bcc2dcfc.png',
        ]);


//  with an existing category ID 2

           DB::table('products')->insert([
            'productName' => 'lop4',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 9,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 2,
            'image1' => 'uploads/office1.jpg',
            'image2' => 'uploads/office1.jpg',
            'image3' => 'uploads/office1.jpg',
        ]);





           DB::table('products')->insert([
            'productName' => 'lop2',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 6,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 2,
            'image1' => 'uploads/office2.jpg',
            'image2' => 'uploads/office2.jpg',
            'image3' => 'uploads/office2.jpg',
        ]);



            DB::table('products')->insert([
            'productName' => 'AWlomndra',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 6.7,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 2,
            'image1' => 'uploads/office3.jpg',
            'image2' => 'uploads/office3.jpg',
            'image3' => 'uploads/office3.jpg',
        ]);


        
            DB::table('products')->insert([
            'productName' => 'ASlomndra',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 6.7,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 2,
            'image1' => 'uploads/office4.jpg',
            'image2' => 'uploads/office4.jpg',
            'image3' => 'uploads/office4.jpg',
        ]);



           DB::table('products')->insert([
            'productName' => 'BKlowndra',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 6.7,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 2,
            'image1' => 'uploads/office5.jpg',
            'image2' => 'uploads/office5.jpg',
            'image3' => 'uploads/office5.jpg',
        ]);




           DB::table('products')->insert([
            'productName' => 'Itaa',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 18,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 2,
            'image1' => 'uploads/office6.jpg',
            'image2' => 'uploads/office6.jpg',
            'image3' => 'uploads/office6.jpg',
        ]);


           DB::table('products')->insert([
            'productName' => 'DMloona',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 14,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 2,
            'image1' => 'uploads/office7.png',
            'image2' => 'uploads/office7.png',
            'image3' => 'uploads/office7.png',
           ]);



              DB::table('products')->insert([
            'productName' => 'Polma',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 22,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 2,
            'image1' => 'uploads/office8.png',
            'image2' => 'uploads/office8.png',
            'image3' => 'uploads/office8.png',
           ]);



 DB::table('products')->insert([
            'productName' => 'Pot 1',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 2,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss1.png',
            'image2' => 'uploads/acss1.png',
            'image3' => 'uploads/acss1.png',
           ]);

           
 DB::table('products')->insert([
            'productName' => 'Color stone 1',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss2.png',
            'image2' => 'uploads/acss2.png',
            'image3' => 'uploads/acss2.png',
           ]);

 DB::table('products')->insert([
            'productName' => 'Color stone 2',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss3.png',
            'image2' => 'uploads/acss3.png',
            'image3' => 'uploads/acss3.png',
           ]);


            DB::table('products')->insert([
            'productName' => 'Color stone 3',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss4.png',
            'image2' => 'uploads/acss4.png',
            'image3' => 'uploads/acss4.png',
           ]);



             DB::table('products')->insert([
            'productName' => 'Pot A',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss5.jpg',
            'image2' => 'uploads/acss5.jpg',
            'image3' => 'uploads/acss5.jpg',
           ]);

           
                DB::table('products')->insert([
            'productName' => 'Pot q',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1.5,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss6.jpg',
            'image2' => 'uploads/acss6.jpg',
            'image3' => 'uploads/acss6.jpg',
           ]);




 

           
     DB::table('products')->insert([
            'productName' => 'Pot O',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 2.99,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss8.jpg',
            'image2' => 'uploads/acss8.jpg',
            'image3' => 'uploads/acss8.jpg',
           ]);

       
     DB::table('products')->insert([
            'productName' => 'Pot Q',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1.99,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss9.jpg',
            'image2' => 'uploads/acss9.jpg',
            'image3' => 'uploads/acss9.jpg',
           ]);


              DB::table('products')->insert([
            'productName' => 'Pot 88',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1.99,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss10.jpg',
            'image2' => 'uploads/acss10.jpg',
            'image3' => 'uploads/acss10.jpg',
           ]);



           
              DB::table('products')->insert([
            'productName' => 'Potlw',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1.5,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss11.jpg',
            'image2' => 'uploads/acss11.jpg',
            'image3' => 'uploads/acss11.jpg',
           ]);



      DB::table('products')->insert([
            'productName' => 'Pot pls',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1.3,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss12.jpg',
            'image2' => 'uploads/acss12.jpg',
            'image3' => 'uploads/acss12.jpg',
           ]);

           
                 DB::table('products')->insert([
            'productName' => 'Pot Gray',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 1.8,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss13.jpg',
            'image2' => 'uploads/acss13.jpg',
            'image3' => 'uploads/acss13.jpg',
           ]);


                     DB::table('products')->insert([
            'productName' => 'Pot Brown',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 2,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss14.jpg',
            'image2' => 'uploads/acss14.jpg',
            'image3' => 'uploads/acss14.jpg',
           ]);



                     DB::table('products')->insert([
            'productName' => 'Pot Whait',
            'Sdescription' => 'Short description for Sample Product ',
            'Ldescription' => 'Long description for Sample Product ',
            'price' => 2,
            'stockqty' => 100,
            'status' => 'Available',
            'categoryId' => 3,
            'image1' => 'uploads/acss15.jpg',
            'image2' => 'uploads/acss15.jpg',
            'image3' => 'uploads/acss15.jpg',
           ]);
    }
}