<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use App\Models\UsersModel;
use App\Models\PembayaranModel;

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
            return redirect()->to(base_url('/login'));
        }

        // ROLE PENGUNA YANG DIPERBOLEHKAN DALAM AKSES ROUTE
        $allowedRoles = $arguments ?? [];

        $userRole = session('role');
        // Periksa apakah role pengguna ada dalam daftar yang diizinkan
        if (!in_array($userRole, $allowedRoles)) {
            // Jika rolenya tidak sesuai, kembalikan response dengan status 404
            return redirect()->to(base_url('/404'));
        }

        $status = session()->get('status');
        if ($status == 'active') {
            $usersModel      = new UsersModel();
            $pembayaranModel = new PembayaranModel();

            $id    = session()->get('id');
            $hasil = $pembayaranModel->getExpiredPembayaran($id);

            if (!empty($hasil)) {
                // UPDATE STATUS USER MENJADI NONACTIVE
                $usersModel->update($id, ['status' => 'nonactive']);

                // UPDATE SESSION USER MENJADI NONACTIVE
                $sessionData = [
                    'id'                => session()->get('id'),
                    'nama'              => session()->get('nama'),
                    'email'             => session()->get('email'),
                    'role'              => session()->get('role'),
                    'foto'              => session()->get('foto'),
                    'encrypt'           => session()->get('encrypt'),
                    'status'            => 'nonactive',
                    'is_veryfied_email' => session()->get('is_veryfied_email'),
                    'logged_in'         => true
                ];
                session()->set($sessionData);
            }
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
