<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateServiceRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service-repository {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Service, Repository, and Interface for a model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model = $this->argument('model');

        // Tạo thư mục nếu chưa tồn tại

        $servicePath = app_path('Services/Eloquent');
        $serviceInterfacePath = app_path('Services/Contracts');
        $repositoryPath = app_path('Repositories/Eloquent');
        $repositoryInterfacePath = app_path('Repositories/Contracts');
        if (!File::exists($servicePath)) {
            File::makeDirectory($servicePath, 0755, true);
        }
        if (!File::exists($serviceInterfacePath)) {
            File::makeDirectory($serviceInterfacePath, 0755, true);
        }
        if (!File::exists($repositoryPath)) {
            File::makeDirectory($repositoryPath, 0755, true);
        }
        if (!File::exists($repositoryInterfacePath)) {
            File::makeDirectory($repositoryInterfacePath, 0755, true);
        }

        // Tạo Service
        $serviceContent = "<?php\n\nnamespace App\Services\Eloquent;\n\nuse App\Services\Contracts\\{$model}ServiceInterface;\n\nclass {$model}Service implements {$model}ServiceInterface\n{\n    // Your code here\n}\n";
        File::put("$servicePath/{$model}Service.php", $serviceContent);

        // Tạo Service Interface
        $serviceInterfaceContent = "<?php\n\nnamespace App\Services\Contracts;\n\ninterface {$model}ServiceInterface\n{\n    // Your code here\n}\n";
        File::put("$serviceInterfacePath/{$model}ServiceInterface.php", $serviceInterfaceContent);

        // Tạo Repository
        $repositoryContent = "<?php\n\nnamespace App\Repositories\Eloquent;\n\nuse App\Models\\{$model};\nuse App\Repositories\Contracts\\{$model}RepositoryInterface;\nuse App\Repositories\Eloquent\BaseRepository;\n\nclass {$model}Repository extends BaseRepository implements {$model}RepositoryInterface\n{\n    public function __construct({$model} \$model)\n    {\n        parent::__construct(\$model);\n    }\n\n    // Your custom methods here\n}\n";
        File::put("$repositoryPath/{$model}Repository.php", $repositoryContent);
        // Tạo Repository Interface
        $repositoryInterfaceContent = "<?php\n\nnamespace App\Repositories\Contracts;\n\nuse App\Repositories\Contracts\BaseRepositoryInterface;\n\ninterface {$model}RepositoryInterface extends BaseRepositoryInterface\n{\n    // Your custom methods here\n}\n";
        File::put("$repositoryInterfacePath/{$model}RepositoryInterface.php", $repositoryInterfaceContent);

        $this->info("Tạo thành công Service, Repository, và Interfaces cho {$model} !");
    }
}