<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        // Validasi apakah pengguna sudah login
        $session = session();
        if (!$session->get('logged_in')) {
            return redirect()->to(base_url('/'));
        }

        // ROLE PENGUNA YANG DIPERBOLEHKAN DALAM AKSES ROUTE
        $allowedRoles = $arguments ?? [];

        $userRole = session()->get('role');
        // Periksa apakah role pengguna ada dalam daftar yang diizinkan
        if (!in_array($userRole, $allowedRoles)) {
            // Jika rolenya tidak sesuai, kembalikan response dengan status 404
            return Services::response()->setStatusCode(404);
        }

        return null;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
