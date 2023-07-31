<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Config\ConfigRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ConfigController extends Controller
{
    protected $configRepo;

    public function __construct(ConfigRepositoryInterface $configRepo)
    {
        $this->configRepo = $configRepo;
    }

    public function index()
    { //View

        $configs = $this->configRepo->getAll();
        // dd($configs);

        return view('admin.configs.show', compact('configs'));
    }

    public function getConfig($key) //View -> id
    {
        $value = $this->configRepo->getConfig($key);
        return $value;
    }

    public function create()
    {
        return view('admin.configs.create');
    }

    public function addConfig(Request $request) //Add
    {
        $add = $this->configRepo->addConfig($request);
        if ($add) {
            return redirect()->route('configs.index')->with('success', 'Thêm mới thông tin thành công.');
        } else {
            return redirect()->route('configs.index')->with('error', 'Key đã tồn tại. Vui lòng chọn key khác.');
        }
    }

    public function edit($id)
    {
        $configs = $this->configRepo->find($id);
        return view('admin.configs.edit', compact('configs'));
    }

    public function updateConfig(Request $request, $id) //Update
    {
        $update = $this->configRepo->updateConfig($id, $request);

        return redirect()->route('configs.index')->with('success', 'Cập nhật thông tin thành công.');
    }

    public function deleteConfig($id) //Delete
    {
        $delete = $this->configRepo->deleteConfig($id);

        return redirect()->route('configs.index')->with('error', 'Không tìm thấy thông tin cần xoá.');
    }
}
