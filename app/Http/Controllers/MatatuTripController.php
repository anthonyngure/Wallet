<?php
	
	namespace App\Http\Controllers;
	
	use App\Exceptions\ErrorCodes;
	use App\Exceptions\WrappedException;
	use App\MatatuTrip;
	use App\Traits\Paginates;
	use App\User;
	use Auth;
	use Carbon\Carbon;
	use Illuminate\Http\Request;
	
	class MatatuTripController extends Controller
	{
		
		use Paginates;
		
		/**
		 * Display a listing of the resource.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 * @throws \App\Exceptions\WrappedException
		 */
		public function index(Request $request)
		{
			$user = User::with('matatuOfficial', 'saccoOfficial')->findOrFail(Auth::user()->getKey());
			
			$matatuTrips = MatatuTrip::with(['startStage', 'endStage', 'deleteStage'])->withTrashed();
			if (!is_null($user->matatuOfficial)) {
				$matatuTrips = $matatuTrips->where('matatu_official_id', $user->matatuOfficial->getKey());
			} else {
				$errorMessage = 'You are not allowed to view Matatu Trips!';
				throw new WrappedException($errorMessage, ErrorCodes::VALIDATION_ERROR);
			}
			
			return $this->paginate($request, $matatuTrips);
		}
		
		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			//
		}
		
		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 * @throws \App\Exceptions\WrappedException
		 */
		public function store(Request $request)
		{
			$this->validate($request, [
				'startStageId'       => 'required|numeric|exists:stages,id',
				'destinationStageId' => 'required|numeric|exists:stages,id',
				'fare'               => 'required|numeric',
			]);
			
			$matatuOfficial = Auth::user()->matatuOfficial()->with('matatu')->firstOrFail();
			
			$unCompleteMatatuTrips = MatatuTrip::whereMatatuId($matatuOfficial->matatu->getKey())
				->whereNull('end_stage_id')->count();
			
			if ($unCompleteMatatuTrips != 0) {
				$errorMessage = 'You have a trip that is not completed, you cannot add a new one';
				$unCompleteMatatuTrip = MatatuTrip::with(['startStage', 'endStage', 'deleteStage'])
					->whereMatatuId($matatuOfficial->matatu->getKey())
					->whereNull('end_stage_id')->firstOrFail();
				throw new WrappedException($errorMessage, ErrorCodes::NEW_TRIP_ERROR, $unCompleteMatatuTrip);
			}
			
			$matatuTrip = MatatuTrip::create([
				'matatu_id'            => $matatuOfficial->matatu->getKey(),
				'matatu_official_id'   => $matatuOfficial->getKey(),
				'start_remarks'        => $request->startRemarks,
				'start_time'           => Carbon::now()->toDateTimeString(),
				'start_stage_id'       => $request->startStageId,
				'destination_stage_id' => $request->destinationStageId,
				'fare'                 => $request->fare,
			]);
			
			$matatuTrip = MatatuTrip::with(['startStage', 'endStage', 'deleteStage'])
				->findOrFail($matatuTrip->getKey());
			
			return $this->itemCreatedResponse($matatuTrip);
		}
		
		/**
		 * Display the specified resource.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function show($id)
		{
			//
		}
		
		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  int $id
		 * @return \Illuminate\Http\Response
		 */
		public function edit($id)
		{
			//
		}
		
		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  int                      $id
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, $id)
		{
			$this->validate($request, [
				'endStageId' => 'required|numeric|exists:stages,id',
			]);
			$matatuTrip = MatatuTrip::findOrFail($id);
			$matatuTrip->end_time = Carbon::now()->toDateTimeString();
			$matatuTrip->end_remarks = $request->endRemarks;
			$matatuTrip->end_stage_id = $request->endStageId;
			$matatuTrip->save();
			
			$matatuTrip = MatatuTrip::with(['startStage', 'endStage', 'deleteStage'])
				->findOrFail($matatuTrip->getKey());
			
			return $this->itemUpdatedResponse($matatuTrip);
		}
		
		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param  int                     $id
		 * @return \Illuminate\Http\Response
		 * @throws \Exception
		 */
		public function destroy(Request $request, $id)
		{
			$this->validate($request, [
				'deleteStageId' => 'required',
				'deleteRemarks' => 'required',
			]);
			$matatuTrip = MatatuTrip::findOrFail($id);
			if (!is_null($matatuTrip)) {
				$matatuTrip->delete_remarks = $request->deleteRemarks;
				$matatuTrip->delete_stage_id = $request->deleteStageId;
				$matatuTrip->save();
				$matatuTrip->delete();
			}
			
			$matatuTrip = MatatuTrip::onlyTrashed()->with(['startStage', 'endStage', 'deleteStage'])
				->findOrFail($matatuTrip->getKey());
			
			return $this->itemDeletedResponse($matatuTrip);
		}
	}
