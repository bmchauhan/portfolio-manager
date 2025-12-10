<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\PersonalDetail;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Language;
use Carbon\Carbon;

class DataImportSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        if (!$user) {
            $user = User::create([
                'name' => 'Bhavesh Chauhan',
                'email' => 'bhaveshchauhan581998@gmail.com',
                'password' => bcrypt('test@123'), // Default password
            ]);
        }

        // 1. Personal Details
        PersonalDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => 'Bhavesh Chauhan',
                'headline' => 'Sr. Software Developer',
                'email' => 'bhaveshchauhan581998@gmail.com',
                'phone' => '+91-8347803810',
                'address' => 'Vadodara, INDIA',
                'linkedin_url' => 'https://www.linkedin.com/in/chauhan-bhavesh-36a954119/',
                'bio' => "As a PHP Laravel developer, I possess problem-solving and creative thinking skills. I thrive on challenges and am always looking for new technologies to work with. My long-term goal is to become a full-stack developer with expertise in agile methodologies. With proficiency in HTML, CSS, JS, Bootstrap, AngularJS, and RESTful APIs, I have a proven track record of delivering high-quality solutions. I'm a skilled collaborator and committed to producing outstanding results.",
            ]
        );

        // 2. Skills
        $skills = [
            ['name' => 'Angularjs', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fab fa-angular'],
            ['name' => 'API Integration', 'category' => 'skill', 'proficiency' => 'Proficient', 'icon' => 'fas fa-network-wired'],
            ['name' => 'B2B', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fas fa-briefcase'],
            ['name' => 'Bootstrap', 'category' => 'skill', 'proficiency' => 'Proficient', 'icon' => 'fab fa-bootstrap'],
            ['name' => 'Burp Suite', 'category' => 'tool', 'proficiency' => 'Intermediate', 'icon' => 'fas fa-shield-alt'],
            ['name' => 'CSS', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fab fa-css3-alt'],
            ['name' => 'ERP', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fas fa-industry'],
            ['name' => 'GIT', 'category' => 'tool', 'proficiency' => 'Proficient', 'icon' => 'fab fa-git-alt'],
            ['name' => 'Gitlab', 'category' => 'tool', 'proficiency' => 'Intermediate', 'icon' => 'fab fa-gitlab'],
            ['name' => 'HTML', 'category' => 'skill', 'proficiency' => 'Proficient', 'icon' => 'fab fa-html5'],
            ['name' => 'Javascript', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fab fa-js'],
            ['name' => 'JIRA Service Desk', 'category' => 'tool', 'proficiency' => 'Intermediate', 'icon' => 'fab fa-jira'],
            ['name' => 'jQuery', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fas fa-code'],
            ['name' => 'Laravel', 'category' => 'skill', 'proficiency' => 'Proficient', 'icon' => 'fab fa-laravel'],
            ['name' => 'Loan Process', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fas fa-file-invoice-dollar'],
            ['name' => 'Migration Testing', 'category' => 'skill', 'proficiency' => 'Proficient', 'icon' => 'fas fa-exchange-alt'],
            ['name' => 'Payment Gateway Integration', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fas fa-credit-card'],
            ['name' => 'PHP', 'category' => 'skill', 'proficiency' => 'Proficient', 'icon' => 'fab fa-php'],
            ['name' => 'Postman Tool', 'category' => 'tool', 'proficiency' => 'Proficient', 'icon' => 'fas fa-paper-plane'],
            ['name' => 'React', 'category' => 'skill', 'proficiency' => 'Beginner', 'icon' => 'fab fa-react'],
            ['name' => 'Reserve With Google', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fab fa-google'],
            ['name' => 'Slack', 'category' => 'tool', 'proficiency' => 'Proficient', 'icon' => 'fab fa-slack'],
            ['name' => 'SQL', 'category' => 'skill', 'proficiency' => 'Proficient', 'icon' => 'fas fa-database'],
            ['name' => 'Trello', 'category' => 'tool', 'proficiency' => 'Intermediate', 'icon' => 'fab fa-trello'],
            ['name' => 'Wordpress', 'category' => 'skill', 'proficiency' => 'Intermediate', 'icon' => 'fab fa-wordpress'],
            ['name' => 'Workbench', 'category' => 'tool', 'proficiency' => 'Proficient', 'icon' => 'fas fa-tools'],
        ];

        foreach ($skills as $skill) {
            Skill::firstOrCreate(['name' => $skill['name']], $skill);
        }

        // 3. Experiences
        $experiences = [
            [
                'company' => 'WebApp Logic LLP',
                'position' => 'Sr. Software Developer',
                'start_date' => Carbon::parse('2024-10-01'),
                'end_date' => null,
                'is_current' => true,
                'type' => 'full_time',
                'location_type' => 'remote',
                'description' => "<ul><li>Worked as a Senior Software Developer at WebApp Logic LLP, deputed to InApp Technology under a client-assignment model.</li><li>Successfully completed a major Order Management module for the Ariel ERP Project, a critical deliverable for one of WebApp Logic LLP's key clients.</li><li>Independently developed a full WordPress-based website for Site Security Systems, managing the entire lifecycle—from requirement gathering to deployment.</li><li>Contributed to the InApp Technology corporate website, delivering technical enhancements, feature improvements, and content updates.</li><li>Coordinated with internal teams to assign a dedicated resource for continuous support at InApp Technology.</li><li>Executed all listed projects as part of responsibilities at WebApp Logic LLP, demonstrating strong flexibility, ownership, and end-to-end project delivery capabilities.</li></ul>",
                'skills' => ['API Integration', 'Burp Suite', 'CSS', 'ERP', 'GIT', 'Gitlab', 'HTML', 'Javascript', 'JIRA Service Desk', 'jQuery', 'Laravel', 'Migration Testing', 'PHP', 'Postman Tool', 'React', 'Workbench', 'Wordpress']
            ],
            [
                'company' => 'Schedmad PVT Ltd',
                'position' => 'Laravel Developer',
                'start_date' => Carbon::parse('2024-02-01'),
                'end_date' => Carbon::parse('2024-10-01'),
                'is_current' => false,
                'type' => 'full_time',
                'description' => "<p>Working on a scheduling management SaaS project that leverages core PHP MVC architecture alongside Laravel for API development.</p><ul><li><strong>SaaS Development:</strong> Leading the development of a scheduling management platform, ensuring scalability, reliability, and user-friendly design through core PHP MVC architecture.</li><li><strong>API Development:</strong> Building and maintaining APIs using the Laravel framework, enhancing the platform's functionality and enabling seamless integrations with third-party services.</li><li><strong>Dockerization & CI/CD:</strong> Gaining hands-on experience with Dockerization and CI/CD pipelines to streamline the development and deployment processes, improving overall efficiency and reducing downtime.</li><li><strong>Server Deployment:</strong> Managing the deployment of projects to live servers, ensuring smooth and successful launches.</li><li><strong>Code Review:</strong> Conducting code reviews on GitLab to maintain code quality, adherence to best practices, and overall project integrity.</li><li><strong>Collaboration:</strong> Working closely with cross-functional teams to deliver high-quality software solutions on time.</li></ul>",
                'skills' => ['API Integration', 'Bootstrap', 'CSS', 'GIT', 'Gitlab', 'HTML', 'Javascript', 'jQuery', 'Laravel', 'Payment Gateway Integration', 'PHP', 'Postman Tool', 'Reserve With Google', 'SQL']
            ],
            [
                'company' => 'Bharati Software Pvt Ltd',
                'position' => 'Software Developer',
                'start_date' => Carbon::parse('2023-07-01'),
                'end_date' => Carbon::parse('2024-02-01'),
                'is_current' => false,
                'type' => 'full_time',
                'description' => "<p>As a Laravel Developer at BSPL, I played a crucial role in the development and maintenance of web applications, with a strong focus on B2B e-commerce projects and financial systems. My key responsibilities included:</p><ul><li><strong>B2B E-commerce Development:</strong> Led the development of a B2B e-commerce platform where vendors could send quotations, manage purchase requests, and handle transactions via loans and payments. This involved designing and implementing features for product management, quotation handling, order processing, and vendor interactions.</li><li><strong>Payment Gateway Integration:</strong> Successfully integrated and optimized multiple payment gateways to facilitate secure and seamless transactions between vendors, including handling credit-based transactions and loan payments.</li><li><strong>Loan Processing System:</strong> Developed and maintained a loan management module within the e-commerce platform, which streamlined the loan application process and improved overall efficiency and user experience.</li><li><strong>API Development:</strong> Designed and implemented RESTful APIs to enhance the platform's functionality and enable smooth integration with third-party services and external systems.</li><li><strong>Database Management:</strong> Managed and optimized MySQL databases to ensure data integrity and performance, focusing on efficient query processing and system scalability.</li><li><strong>Collaboration and Teamwork:</strong> Worked closely with cross-functional teams, including designers, QA engineers, and other developers, to ensure the timely delivery of high-quality software solutions and meet project deadlines.</li></ul>",
                'skills' => ['API Integration', 'Bootstrap', 'Burp Suite', 'CSS', 'GIT', 'Gitlab', 'HTML', 'Javascript', 'jQuery', 'Laravel', 'PHP', 'Postman Tool', 'Trello', 'Loan Process', 'B2B', 'Payment Gateway Integration', 'Slack', 'SQL', 'Workbench']
            ],
            [
                'company' => 'Bhasker Enterprises',
                'position' => 'Laravel Web Developer',
                'start_date' => Carbon::parse('2019-08-01'),
                'end_date' => Carbon::parse('2023-07-01'),
                'is_current' => false,
                'type' => 'full_time',
                'description' => "<p>At Bhaskar Enterprise, recently known as Transcloud Solutions, my responsibilities included leading the development of multiple product-based projects across diverse industries, with a strong focus on delivering high-quality, scalable web applications. I worked extensively on projects like POEMS, ProAdmin, ActiveWorld, and DCA.</p><ul><li><strong>Project Management & Development:</strong> Spearheading the development of projects such as POEMS (Educational Management System), ProAdmin (Corporate Management System), ActiveWorld (Gym & Swim Package Management SaaS), DCA (Dehradoon Cricket Academy).</li><li><strong>PHP & Laravel Development:</strong> Proficient in building and maintaining web applications using Laravel, following best practices and modern design patterns.</li><li><strong>Payment Integrations:</strong> Integrated payment gateways such as Razorpay, Stripe, HDFC CCAvenue, PNB, and Chargebee into applications, ensuring secure and efficient transactions.</li><li><strong>API Development:</strong> Developed RESTful APIs to enable seamless communication between different services and applications.</li><li><strong>Agile Methodologies:</strong> Used Jira and Trello to follow agile processes for sprint planning, task management, and project delivery.</li><li><strong>Database Management:</strong> Managed MySQL databases, ensuring optimized queries, data integrity, and high performance.</li><li><strong>Version Control & Code Review:</strong> Utilized Git and GitLab for version control and code reviews to ensure quality and consistency.</li><li><strong>Training & Mentorship:</strong> In addition to my development work, I have been responsible for providing training to new interns and joiners.</li></ul>",
                'skills' => ['Angularjs', 'API Integration', 'Bootstrap', 'CSS', 'GIT', 'Gitlab', 'HTML', 'Javascript', 'JIRA Service Desk', 'jQuery', 'Laravel', 'Migration Testing', 'PHP', 'Postman Tool', 'SQL', 'Trello', 'Workbench', 'Payment Gateway Integration']
            ]
        ];

        foreach ($experiences as $exp) {
            $experience = Experience::firstOrCreate(
                ['company' => $exp['company'], 'position' => $exp['position']],
                collect($exp)->except('skills')->toArray()
            );

            if (isset($exp['skills'])) {
                $skillIds = Skill::whereIn('name', $exp['skills'])->pluck('id');
                $experience->skills()->sync($skillIds);
            }
        }

        // 4. Education
        Education::firstOrCreate(
            ['institution' => 'Parul University, Vadodara', 'degree' => 'B.Tech/B.E.'],
            [
                'field_of_study' => 'Computer Science Engineering',
                'start_date' => Carbon::parse('2015-06-01'), // Approximate start based on 4 year degree
                'end_date' => Carbon::parse('2019-06-01'),
                'is_current' => false,
                'description' => 'Grade - 7.2/10',
            ]
        );

        // 5. Languages
        $languages = ['English', 'Hindi'];
        foreach ($languages as $lang) {
            Language::firstOrCreate(['name' => $lang]);
        }
    }
}
