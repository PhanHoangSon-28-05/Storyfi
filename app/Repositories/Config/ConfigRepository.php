<?php

namespace App\Repositories\Config;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ConfigRepository extends BaseRepository implements ConfigRepositoryInterface
{

    //lấy model tương ứng
    public function getModel()
    {
        return \App\Models\Config::class;
    }


    public function getConfig($key)
    {
        if (Cache::has($key)) {
            $value = Cache::get($key);
        } else {
            $value = $this->model->where('key_name', $key)->value('value');
            Cache::put($key, $value);
        }

        return $value;
    }

    public function addConfig($attributes = [])
    {
        // Kiểm tra xem key đã tồn tại chưa
        $key =  $attributes['key_name'];
        $replacement = array(
            'â' => 'a', 'Â' => 'A',
            'ê' => 'e', 'Ê' => 'E',
            'ô' => 'o', 'Ô' => 'O',
            'ơ' => 'o', 'Ơ' => 'O',
            'ư' => 'u', 'Ư' => 'U',
            'đ' => 'd', 'Đ' => 'D'
        );
        $key = strtr($key, $replacement);
        $key = preg_replace('/[^A-Za-z0-9]/', '', $key);
        $key =  str_replace(' ', '', $key);

        $existingConfig = $this->model->where('key_name', $key)->first();
        // dd($existingConfig == true);
        if ($existingConfig) {
            return false;
        }

        // Thêm
        $config = $this->model->create([
            'key_name' => $key,
            'value' => $attributes['value'],
        ]);

        // Xoá cache để cập nhật dữ liệu mới
        Cache::forget($key);

        return true;
    }

    public function updateConfig($id, $attributes = [])
    {
        // Cập nhật
        $config = $this->model->find($id);
        $config->update([
            'value' => $attributes['value'],
        ]);

        // Xoá cache để cập nhật dữ liệu mới
        Cache::forget($config->key_name);
        return true;
    }

    public function deleteConfig($id)
    {
        $config = $this->model->find($id);

        if ($config) {
            // Xoá
            $config->delete();

            // Xoá cache để cập nhật dữ liệu mới
            Cache::forget($config->key_name);

            return true;
        }

        return false;
    }
}
