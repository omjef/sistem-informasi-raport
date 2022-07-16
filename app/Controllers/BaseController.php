<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->AkunGuruModel = new \App\Models\AkunGuruModel();
        $this->AkunSiswaModel = new \App\Models\AkunSiswaModel();
        $this->GuruModel = new \App\Models\GuruModel();
        $this->SiswaModel = new \App\Models\SiswaModel();
        $this->KelasModel = new \App\Models\KelasModel();
        $this->MapelModel = new \App\Models\MapelModel();
        $this->NilaiModel = new \App\Models\NilaiModel();
        $this->SekolahModel = new \App\Models\SekolahModel();
        $this->EskulModel = new \App\Models\EskulModel();
        $this->NilaiEskulModel = new \App\Models\NilaiEskulModel();
        $this->SikapModel = new \App\Models\SikapModel();
        $this->AbsensiModel = new \App\Models\AbsensiModel();
    }
}
