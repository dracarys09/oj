<?php

class ProblemController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($contest_id)
	{
		//Validate problem
		if(Problem::isValid(Input::all()))
		{
			if(Problem::store(Input::all(), $contest_id))
			{
				$contest_name = Challenge::find($contest_id)->name;
				return Redirect::route('edit_problems', ['contest_name' => $contest_name])->with('flash_message','Problem Added Successfully!');
			}
			else
			{
				dd("Server problem... Please try again later!");
			}
		}
		else
		{
			return Redirect::back()->withInput()->with('flash_message',Problem::$errors." Please try again...");
		}
	}

	public static function add_testcase($problem_id)
	{
		/*
		userdata/instructor/challenge_id/problem_id/in.txt
		userdata/instructor/challenge_id/problem_id/out.txt
		*/
		// dd($problem_id);

		if(Input::hasFile('input_file') && Input::hasFile('output_file'))
		{
			$challenge_id = Challenge::get_challenge_id_for_problem($problem_id);

			$input_path = "userdata/instructor/".$challenge_id."/".$problem_id."/in"."/";
			$output_path = "userdata/instructor/".$challenge_id."/".$problem_id."/out"."/";

			$directory = "userdata/instructor/".$challenge_id."/".$problem_id."/in"."/";
			$files = glob($directory . '*.txt');


			if ( count($files) == 0 )
			{
				Input::file('input_file')->move($input_path,"0.txt");
				Input::file('output_file')->move($output_path,"0.txt");
			}
			else
			{
				$filecount = count( $files );

				Input::file('input_file')->move($input_path,$filecount.".txt");
				Input::file('output_file')->move($output_path,$filecount.".txt");
			}

			$contest_name = Challenge::get_contest_name($problem_id);
			return Redirect::route('edit_problems',array('contest_name' => $contest_name))->with('flash_message',"Testcase added Successfully!");
		}
		else
		{
			return Redirect::back()->withInput()->with('flash_message',"Server Error. Please try again later...");
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($problem_id)
	{
		$user = Auth::user();
		$problem = Problem::get_problem_by_id($problem_id);
		$challenge = Challenge::get_challenge_for_problem($problem_id);
		return View::make('student.show_problem')->with('challenge',$challenge)->with('user',$user)->with('problem',$problem);
	}

	public static function evaluate($problem_id)
	{
		$challenge_id = Challenge::get_challenge_id_for_problem($problem_id);
		$lang = "cpp";
		if(Input::hasFile('solution_file'))
		{
			$solution_path = "userdata/student/".$challenge_id."/".$problem_id."/";
			$directory = "userdata/student/".$challenge_id."/".$problem_id."/";
			$files = glob($directory . '*.cpp');

			if ( count($files) == 0 )
			{
				Input::file('solution_file')->move($solution_path,"0.".$lang);
				$path = $solution_path."0.".$lang;
				$out_path = $solution_path."0";
				$db_path = $solution_path."0.".$lang;
			}
			else
			{
				$filecount = count( $files );
				Input::file('solution_file')->move($solution_path,$filecount.".".$lang);
				$path = $solution_path.$filecount.".".$lang;
				$out_path = $solution_path.$filecount;
				$db_path = $solution_path.$filecount.".".$lang;
			}

			//Evaluation logic below

			//try to compile the solution file
			exec("g++ ".$path." -o ".$out_path." 2>&1",$output);
			if(count($output) == 0)
			{
				//Compilation Successfull...Now run this solution file against each testcase and show the results
				$input_path = "userdata/instructor/".$challenge_id."/".$problem_id."/in"."/";
				$output_path = "userdata/instructor/".$challenge_id."/".$problem_id."/out"."/";

				$directory = "userdata/instructor/".$challenge_id."/".$problem_id."/in"."/";
				$files = glob($directory . '*.txt');


				if ( count($files) == 0 )
				{
					//No testcase present...Handle this properly
				}
				else
				{
					$filecount = count( $files );
					$passed_testcases = 0;
					for($i = 0;$i < $filecount;$i++)
					{
						$input_file = $input_path.$i.".txt";
						$output_file = $output_path.$i.".txt";

						//create a temperary directory
						if(!file_exists("userdata/student/".$challenge_id."/".$problem_id."/temp"))
						{
							exec("mkdir userdata/student/".$challenge_id."/".$problem_id."/temp");
						}


						//Give input file as input and check the output against the output file
						$temp = $solution_path."temp/temp_output.txt";
						exec("cat ".$input_file." | ".$out_path." > userdata/student/".$challenge_id."/".$problem_id."/temp/temp.txt");


						//compare solution output and correct output
						exec("diff ".$output_file." userdata/student/".$challenge_id."/".$problem_id."/temp/temp.txt 2>&1",$output);
						if(count($output) == 0)
						{
							$passed_testcases++;
						}
					}
					if($passed_testcases == $filecount )
					{
						//solution passed all the testcases
						$status = "Accepted";
					}
					else
					{
						$status = "Wrong Answer";
					}
				}
			}
			else
			{
				//compilation error
				$status = "Compilation Error";
				//dd("compilation error!");
			}

			//Store values in database in solutions table
			if(Solution::store(Auth::user()->id, $problem_id, $db_path, $status))
			{
 				//Redirect to show results page
				return Redirect::route('show_results',array('challenge_id' => $challenge_id, 'user_id' => Auth::user()->id, 'problem_id' => $problem_id));
			}
			else
			{
				dd("server error!");
			}

		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($problem_id)
	{
		$contest_id = Problem::find($problem_id)->challenge_id;
		if(Problem::delete_problem($problem_id))
		{
			$contest_name = Challenge::find($contest_id)->name;
			return Redirect::route('edit_problems', ['contest_name' => $contest_name])->with('flash_message','Problem Deleted Successfully!');
		}
		else
		{
			dd("Server Problem... Please Try Again Later.");
		}
	}


}
