<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ContractorController extends Controller
{
    public function showRegistrationForm()
    {
        return view('contractor.registration');
    }

    // Step 2: Handle contractor registration
    public function register(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'organization' => 'nullable|string|max:255',
            'te_id' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'host' => 'required|string|max:255',
        ]);

        // Store contractor's details in the database
        $contractor = Contractor::create($request->all());

        // Store contractor in session
        session(['contractor' => $contractor]);

        // Redirect to formation list page
        return redirect()->route('contractor.formations');
    }


    public function showFormations()
    {
        $formations = [
            [
                'id' => 1,
                'title' => 'Safety Procedures in Manufacturing',
                'description' => 'Learn about the best safety practices in manufacturing environments.',
                'image' => 'images/formation1.jpg',
                'video' => 'videos/formation1.mp4',
                'quiz' => [
                    ['question' => 'What is the primary goal of safety procedures?', 'options' => ['Increase productivity', 'Prevent accidents', 'Reduce costs'], 'answer' => 1],
                    ['question' => 'Which of the following is a common safety measure?', 'options' => ['Protective equipment', 'Open electrical panels', 'Unsecured machinery'], 'answer' => 0],
                    ['question' => 'How often should safety training be updated?', 'options' => ['Once a year', 'Every two years', 'Ongoing'], 'answer' => 2]
                ]
            ],
            [
                'id' => 2,
                'title' => 'Introduction to Electrical Connectors',
                'description' => 'Understand the basics of electrical connectors used in various applications.',
                'image' => 'images/formation2.jpg',
                'video' => 'videos/formation2.mp4',
                'quiz' => [
                    ['question' => 'What is the purpose of an electrical connector?', 'options' => ['To connect circuits', 'To insulate wires', 'To power devices'], 'answer' => 0],
                    ['question' => 'Which type of connector is used for high-speed data transmission?', 'options' => ['USB', 'RCA', 'XLR'], 'answer' => 0],
                    ['question' => 'What material is commonly used in connectors for durability?', 'options' => ['Plastic', 'Aluminum', 'Copper'], 'answer' => 1]
                ]
            ],
            [
                'id' => 3,
                'title' => 'Cable Management Techniques',
                'description' => 'Learn about effective methods for managing cables in various setups.',
                'image' => 'images/formation3.jpg',
                'video' => 'videos/formation3.mp4',
                'quiz' => [
                    ['question' => 'Why is cable management important?', 'options' => ['To improve aesthetics', 'To prevent signal interference', 'To reduce cost'], 'answer' => 1],
                    ['question' => 'Which tool is commonly used for cable management?', 'options' => ['Cable ties', 'Heat shrink tubing', 'Crimping tool'], 'answer' => 0],
                    ['question' => 'What is a common mistake in cable management?', 'options' => ['Over-bundling cables', 'Using cable clips', 'Color-coding cables'], 'answer' => 0]
                ]
            ],
            [
                'id' => 4,
                'title' => 'Advanced Connector Technologies',
                'description' => 'Explore advanced technologies in connectors and their applications.',
                'image' => 'images/formation4.jpg',
                'video' => 'videos/formation4.mp4',
                'quiz' => [
                    ['question' => 'What is an advanced feature of modern connectors?', 'options' => ['High-speed data transfer', 'Enhanced insulation', 'Eco-friendly materials'], 'answer' => 0],
                    ['question' => 'Which industry benefits from advanced connectors the most?', 'options' => ['Automotive', 'Healthcare', 'Telecommunications'], 'answer' => 2],
                    ['question' => 'What does “IP rating” indicate in connectors?', 'options' => ['Impact protection', 'Ingress protection', 'Insulation performance'], 'answer' => 1]
                ]
            ],
            [
                'id' => 5,
                'title' => 'Quality Assurance in Connector Manufacturing',
                'description' => 'Understand the quality control measures in connector manufacturing.',
                'image' => 'images/hse.png',
                'video' => 'videos/formation5.mp4',
                'quiz' => [
                    ['question' => 'What is a common quality control method in manufacturing?', 'options' => ['Visual inspection', 'Random sampling', 'Destructive testing'], 'answer' => 1],
                    ['question' => 'What standard is often used for quality assurance in connectors?', 'options' => ['ISO 9001', 'IEC 60601', 'UL 94'], 'answer' => 0],
                    ['question' => 'Why is traceability important in manufacturing?', 'options' => ['To ensure product safety', 'To reduce manufacturing costs', 'To speed up production'], 'answer' => 0]
                ]
            ],
            [
                'id' => 6,
                'title' => 'TE Connectivity Product Overview',
                'description' => 'Get an overview of TE Connectivity products and their uses.',
                'image' => 'images/formation6.jpg',
                'video' => 'videos/formation6.mp4',
                'quiz' => [
                    ['question' => 'Which product category does TE Connectivity specialize in?', 'options' => ['Electrical connectors', 'Mechanical components', 'Software solutions'], 'answer' => 2],
                    ['question' => 'What is a key advantage of TE Connectivity products?', 'options' => ['Innovation', 'Cost-effectiveness', 'Ease of installation'], 'answer' => 0],
                    ['question' => 'In which industries are TE Connectivity products commonly used?', 'options' => ['Automotive and Aerospace', 'Fashion and Textiles', 'Food and Beverage'], 'answer' => 1]
                ]
            ]
        ];

        return view('contractor.formations', compact('formations'));

    }
}
