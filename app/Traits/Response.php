<?php

namespace App\Traits;

trait Response 
{
    /**
     * Return a success JSON response.
     *
     * @param  array|string  $data
     * @param  string  $message
     * @param  int|null  $code
     * @return \Illuminate\Http\JsonResponse
     */
	protected function success($data, string $message = null, int $code = 200)
	{
        if(!is_array($data)) $data = $this->clean($data);
		return response()->json([
			'status' => 'success',
			'message' => $message,
			'data' => $data
        ], $code, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
	}

	/**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  array|string|null  $data
     * @return \Illuminate\Http\JsonResponse
     */
	protected function error($data = null, string $message = null, int $code)
	{
		return response()->json([
			'status' => 'error',
			'message' => $message,
			'data' => $data
		], $code, [], JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT);
	}


     /**
   * Remove un-use meta information in response
   * @param $data
   * @return mixed
   */
    public function clean($data)
    {
        if($data===null) return [];
        if(!is_array($data)){
            $data = $data->toArray();
        }
        if(isset($data['total'])){
            unset(
            $data['links'],
            $data['last_page_url'],
            $data['first_page_url'],
            $data['prev_page_url'],
            $data['next_page_url']
            );
        }
        return $data;
    }
}