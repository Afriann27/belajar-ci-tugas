<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Pastikan user login
        if (!$session->has('role')) {
            return redirect()->to('/login');
        }

        // Jika butuh validasi per-role
        if ($arguments && !in_array($session->get('role'), $arguments)) {
            return redirect()->to('/unauthorized'); // Atau halaman error lain
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak perlu melakukan apa pun di sini
    }
}
    