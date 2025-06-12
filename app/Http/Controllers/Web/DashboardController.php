<?php

namespace App\Http\Controllers\Web;

use App\Models\File;
use App\Models\PasswordReset;
use App\Models\Role;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\Art as ResourcesArt;
use App\Http\Resources\Event as ResourcesEvent;
use App\Http\Resources\Message as ResourcesMessage;
use App\Http\Resources\Role as ResourcesRole;
use App\Http\Resources\User as ResourcesUser;
use App\Models\Art;
use App\Models\Event;
use App\Models\Message;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */
class DashboardController extends Controller
{
    // ==================================== HTTP GET METHODS ====================================
    /**
     * GET: Home page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * GET: account page
     *
     * @return \Illuminate\View\View
     */
    public function account()
    {
        return view('account');
    }

    /**
     * GET: Users list page
     *
     * @return \Illuminate\View\View
     */
    public function users()
    {
        // roles
        $roles = Role::all();
        // role "Administrateur"
        $admin_role = Role::where('role_name', 'Administrateur')->first();
        // users
        $users_collection = request()->has('status') ? User::where([['id', '<>', Auth::user()->id], ['is_active', '=', request()->get('status')]])->orderByDesc('created_at')->paginate(5)->appends(request()->query()) : User::where('id', '<>', Auth::user()->id)->orderByDesc('created_at')->paginate(5)->appends(request()->query());
        $users_data = ResourcesUser::collection($users_collection)->resolve();

        return view('users', [
            'roles' => $roles,
            'users' => $users_data,
            'users_req' => $users_collection,
            'admin' => $admin_role
        ]);
    }

    /**
     * GET: Users list page
     *
     * @param  string $entity
     * @return \Illuminate\View\View
     */
    public function usersEntity($entity)
    {
        if (!in_array($entity, ['roles', 'search'])) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Il n\'y a aucun lien de ce genre.');
        }

        // roles
        $roles = Role::all();

        if ($entity == 'roles') {
            // page title
            $entity_title = 'Gérer les rôles';

            return view('users', [
                'roles' => $roles,
                'entity' => $entity,
                'entity_title' => $entity_title
            ]);
        }

        if ($entity == 'search') {
            // Search users with role "Client"
            $search = request()->get('q');

            if (!$search) {
                return response()->json([
                    'status' => 'empty',
                    'data' => [],
                ]);
            }

            // ============= Une recherche plus chirurgicale ============
            $customers = User::when($search, function ($query, $search) {
                                    $search = trim($search);
                                    $keywords = preg_split('/\s+/', $search); // split by space

                                    $query->where(function ($q) use ($keywords) {

                                        foreach ($keywords as $keyword) {
                                            $q->where(function ($sub) use ($keyword) {
                                                $sub->where('firstname', 'LIKE', $keyword . '%')
                                                ->orWhere('lastname', 'LIKE', $keyword . '%')
                                                ->orWhereRaw("CONCAT(firstname, ' ', lastname) LIKE ?", [$keyword . '%']);
                                            });
                                        }
                                    });
                                })->orderBy('firstname')->get();
            // $customers = User::when($search, function ($query, $search) {
            //                         $query->where(function ($q) use ($search) {
            //                             $q->where('firstname', 'LIKE', '%' . $search . '%')->orWhere('lastname', 'LIKE', '%' . $search . '%');
            //                         });
            //                     })->orderBy('firstname')->get();

            if ($customers->isEmpty()) {
                return response()->json([
                    'status' => 'error', 
                    'message' => 'Aucun client trouvé.'
                ]);
            }

            return response()->json([
                'status' => 'success', 
                'message' => 'Clients trouvés.',
                'data' => ResourcesUser::collection($customers)->resolve()
            ]);
        }
    }

    /**
     * GET: Show user page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function userDatas($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Utilisateur non trouvé.');
        }

        return view('users', ['selected_user' => new ResourcesUser($user)]);
    }

    /**
     * GET: Show user page
     *
     * @param  string $entity
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function userEntityDatas($entity, $id)
    {
        if (!in_array($entity, ['roles'])) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Il n\'y a aucun lien de ce genre.');
        }

        if ($entity == 'roles') {
            $role = Role::find($id);

            if (!$role) {
                return redirect(RouteServiceProvider::HOME)->with('error_message', 'Rôle non trouvé.');
            }

            return view('users', [
                'selected_role' => new ResourcesRole($role),
                'entity' => $entity,
                'entity_title' => $role->role_name
            ]);
        }
    }

    /**
     * GET: Events list page
     *
     * @return \Illuminate\View\View
     */
    public function events()
    {
        // events
        $events_collection = Event::orderByDesc('created_at')->paginate(5)->appends(request()->query());
        $events_data = ResourcesEvent::collection($events_collection)->resolve();

        return view('events', [
            'events' => $events_data,
            'events_req' => $events_collection,
        ]);
    }

    /**
     * GET: Show event page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function eventDatas($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Evénément non trouvé.');
        }

        return view('events', ['selected_event' => new ResourcesEvent($event)]);
    }

    /**
     * GET: Arts list page
     *
     * @return \Illuminate\View\View
     */
    public function arts()
    {
        // arts
        $arts_collection = Art::orderByDesc('created_at')->paginate(5)->appends(request()->query());
        $arts_data = ResourcesArt::collection($arts_collection)->resolve();

        return view('arts', [
            'arts' => $arts_data,
            'arts_req' => $arts_collection,
        ]);
    }

    /**
     * GET: Show art page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function artDatas($id)
    {
        $art = Art::find($id);

        if (!$art) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Art non trouvé.');
        }

        return view('arts', ['selected_art' => new ResourcesArt($art)]);
    }

    /**
     * GET: Messages list page
     *
     * @return \Illuminate\View\View
     */
    public function messages()
    {
        // messages
        $messages_collection = Message::orderByDesc('created_at')->paginate(5)->appends(request()->query());
        $messages_data = ResourcesMessage::collection($messages_collection)->resolve();

        return view('messages', [
            'messages' => $messages_data,
            'messages_req' => $messages_collection,
        ]);
    }

    /**
     * GET: Show message page
     *
     * @param  int $id
     * @return \Illuminate\View\View
     */
    public function messageDatas($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Message non trouvé.');
        }

        return view('messages', ['selected_message' => new ResourcesMessage($message)]);
    }

    // ==================================== HTTP DELETE METHODS ====================================
    /**
     * GET: Delete customer
     *
     * @param  int $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function removeUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Utilisateur non trouvé.');
        }

        $user->delete();

        return redirect('/users')->with('success_message', 'Utilisateur supprimé.');
    }

    /**
     * GET: Delete customer
     *
     * @param  string $entity
     * @param  int $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function removeUserEntity($entity, $id)
    {
        if (!in_array($entity, ['roles'])) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Il n\'y a aucun lien de ce genre.');
        }

        if ($entity == 'roles') {
            $role = Role::find($id);

            if (!$role) {
                return back()->with('error_message', 'Rôle non trouvé.');
            }

            $role->delete();

            return redirect('/users/' . $entity)->with('success_message', 'Rôle supprimé.');
        }
    }

    /**
     * GET: Delete event
     *
     * @param  int $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function removeEvent($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Evénement non trouvé.');
        }

        $event->delete();

        return redirect('/events')->with('success_message', 'Evénement supprimé.');
    }

    /**
     * GET: Delete art
     *
     * @param  int $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function removeArt($id)
    {
        $art = Art::find($id);

        if (!$art) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Art non trouvé.');
        }

        $art->delete();

        return redirect('/arts')->with('success_message', 'Art supprimé.');
    }

    /**
     * GET: Delete message
     *
     * @param  int $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function removeMessage($id)
    {
        $message = Message::find($id);

        if (!$message) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Message non trouvé.');
        }

        $message->delete();

        return redirect('/messages')->with('success_message', 'Message supprimé.');
    }

    // ==================================== HTTP POST METHODS ====================================
    /**
     * POST: Update account
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function updateAccount(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        // Preparing dynamic rules
        $rules = [];

        if ($request->has('firstname')) {
            $rules['firstname'] = ['required', 'string', 'max:255'];
        }

        if ($request->has('lastname')) {
            $rules['lastname'] = ['nullable', 'string', 'max:255'];
        }

        if ($request->has('surname')) {
            $rules['surname'] = ['nullable', 'string', 'max:255'];
        }

        if ($request->has('gender')) {
            $rules['gender'] = ['nullable', Rule::in(['M', 'F'])];
        }

        if ($request->has('birthdate')) {
            $rules['birthdate'] = ['nullable', 'date_format:d/m/Y'];
        }

        if ($request->has('p_o_box')) {
            $rules['p_o_box'] = ['nullable', 'string', 'max:255'];
        }

        if ($request->has('address_1')) {
            $rules['address_1'] = ['nullable', 'string'];
        }

        if ($request->has('address_2')) {
            $rules['address_2'] = ['nullable', 'string'];
        }

        if ($request->has('phone')) {
            $rules['phone'] = ['nullable', 'string', 'max:20'];
        }

        if ($request->has('email') && $request->input('email') !== $user->email) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)];
        }

        if ($request->has('username') && $request->input('username') !== $user->username) {
            $rules['username'] = ['required', 'string', 'max:45', Rule::unique('users')->ignore($user->id)];
        }

        if ($request->filled('password')) {
            $rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];
        }

        if ($request->has('image_64')) {
            $rules['image_64'] = ['required', 'string', 'starts_with:data:image/'];
        }

        // Validation of present fields only
        $validated = $request->validate($rules);

        // Date formatting
        if (isset($validated['birthdate'])) {
            $validated['birthdate'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validated['birthdate'])->format('Y-m-d');
        }

        // Password hash if present
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Processing of the base64 image if present
        if (isset($validated['image_64'])) {
            $replace = substr($validated['image_64'], 0, strpos($validated['image_64'], ',') + 1);
            $image = str_replace($replace, '', $validated['image_64']);
            $image = str_replace(' ', '+', $image);

            $image_path = 'images/users/' . $user->id . '/avatar/' . Str::random(50) . '.png';

            Storage::disk('public')->put($image_path, base64_decode($image));

            $validated['avatar_url'] = Storage::url($image_path);

            unset($validated['image_64']);
        }

        // Update user with valid fields
        $user->update($validated);

        // Update PasswordReset only if necessary
        $password_reset = !empty($user->email)
            ? \App\Models\PasswordReset::where('email', $user->email)->first()
            : \App\Models\PasswordReset::where('phone', $user->phone)->first();

        if ($password_reset) {
            $updateData = [];

            if ($request->filled('email')) {
                $updateData['email'] = $request->email;
            }

            if ($request->filled('phone')) {
                $updateData['phone'] = $request->phone;
            }

            $updateData['token'] = (string) random_int(1000000, 9999999);

            $password_reset->update($updateData);
        }

        // Conditional return: AJAX or HTML POST
        return $request->expectsJson()
            ? response()->json(['success_message' => true, 'avatar_url' => $user->avatar_url ?? null])
            : back()->with('success_message', 'Vos informations ont bien été mises à jour.');
    }

    /**
     * POST: Add a user
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Http\Response
     */
    public function addUser(Request $request)
    {
        $random_int_stringified = (string) random_int(1000000, 9999999);

        // Validate fields
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'username' => ['string', 'username', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'firstname.required' => 'Le prénom est obligatoire.',
            'email.email' => 'Le format de l\'email est invalide.',
            'email.unique' => 'Cet email est déjà utilisé.',
            'phone.required' => 'Le n° de téléphone est obligatoire.',
            'username.unique' => 'Ce nom d\'utilisateur est déjà utilisé.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
        ]);

        // Register user
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'surname' => $request->surname,
            'gender' => $request->gender,
            'birthdate' => isset($request->birthdate) ? explode('/', $request->birthdate)[2] . '-' . explode('/', $request->birthdate)[1] . '-' . explode('/', $request->birthdate)[0] : null,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'p_o_box' => $request->p_o_box,
            'email' => $request->email,
            'phone' => $request->phone,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Register password reset data
        PasswordReset::create([
            'email' => $request->email,
            'phone' => $request->phone,
            'token' => $random_int_stringified,
            'former_password' => $request->password
        ]);

        if (isset($request->image_64)) {
            // $extension = explode('/', explode(':', substr($request->image_64, 0, strpos($request->image_64, ';')))[1])[1];
            $replace = substr($request->image_64, 0, strpos($request->image_64, ',') + 1);
            // Find substring from replace here eg: data:image/png;base64,
            $image = str_replace($replace, '', $request->image_64);
            $image = str_replace(' ', '+', $image);
            // Create image URL
            $image_path = 'images/users/' . $user->id . '/avatar/' . Str::random(50) . '.png';

            // Upload image
            Storage::disk('public')->put($image_path, base64_decode($image));

            $user->update([
                'avatar_url' => Storage::url($image_path),
                'updated_at' => now()
            ]);
        }

        // Register user with role
        $user->roles()->attach([$request->role_id]);

        // The API token
        $token = $user->createToken('auth_token')->plainTextToken;

        $user->update([
            'api_token' => $token,
            'updated_at' => now()
        ]);

        return response()->json(['status' => 'success', 'message' => 'Utilisateur ajouté avec succès.']);
    }

    /**
     * POST: Add a user entity
     *
     * @param  string $entity
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function addUserEntity(Request $request, $entity)
    {
        if (!in_array($entity, ['roles'])) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Il n\'y a aucun lien de ce genre.');
        }

        if ($entity == 'roles') {
            // Validate fields
            $request->validate([
                'role_name' => ['required', 'string', 'max:255'],
            ], [
                'role_name.required' => 'Le nom du rôle est obligatoire.'
            ]);

            // Register role
            Role::create([
                'role_name' => $request->role_name,
                'role_description' => $request->role_description,
                'created_by' => Auth::user()->id,
            ]);
        }

        return response()->json(['status' => 'success', 'message' => 'Données ajoutées avec succès.']);
    }

    /**
     * POST: Add an event
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function addEvent(Request $request)
    {
        $request->validate([
            'event_title' => ['required', 'string', 'max:255'],
            'event_description' => ['nullable', 'numeric', 'between:0,9999999.99'],
            'start_at' => ['nullable', 'string'],
            'end_at' => ['nullable', 'string']
        ]);

        $start_at = null;
        $end_at = null;

        if ($request->filled('start_at')) {
            $parts = explode(' ', $request->start_at); // ['30/05/2025', '14:30']

            if (count($parts) === 2) {
                [$day, $month, $year] = explode('/', $parts[0]);
                $time = $parts[1];
                $start_at = "$year-$month-$day $time:00"; // DATETIME format
            }
        }

        if ($request->filled('end_at')) {
            $parts = explode(' ', $request->end_at); // ['30/05/2025', '14:30']

            if (count($parts) === 2) {
                [$day, $month, $year] = explode('/', $parts[0]);
                $time = $parts[1];
                $end_at = "$year-$month-$day $time:00"; // DATETIME format
            }
        }

        $event = Event::create([
            'event_title' => $request->event_title,
            'event_description' => $request->event_description,
            'start_at' => $start_at,
            'end_at' => $end_at,
        ]);

        if ($request->hasFile('files_urls')) {
            // Types of extensions for different file types
            $video_extensions = ['mp4', 'avi', 'mov', 'mkv', 'webm'];
            $photo_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $audio_extensions = ['mp3', 'wav', 'flac'];
            $document_extensions = ['pdf', 'doc', 'docx', 'txt'];

            // File browsing
            foreach ($request->file('files_urls') as $key => $singleFile) {
                // Checking the file extension
                $file_extension = $singleFile->getClientOriginalExtension();

                // File type check
                $custom_uri = '';
                $is_valid_type = false;
                $file_type = null;

                if (in_array($file_extension, $video_extensions)) { // File is a video
                    $custom_uri = 'videos/events';
                    $file_type = 'video';
                    $is_valid_type = true;

                } elseif (in_array($file_extension, $photo_extensions)) { // File is a photo
                    $custom_uri = 'photos/events';
                    $file_type = 'photo';
                    $is_valid_type = true;

                } elseif (in_array($file_extension, $audio_extensions)) { // File is an audio
                    $custom_uri = 'audios/events';
                    $file_type = 'audio';
                    $is_valid_type = true;

                } elseif (in_array($file_extension, $document_extensions)) { // File is a document
                    $custom_uri = 'documents/events';
                    $file_type = 'document';
                    $is_valid_type = true;
                }

                // If the extension does not match any valid type
                if (!$is_valid_type) {
                    return $this->handleError('Ce type n\'est pas un fichier');
                }

                // Generate a unique path for the file
                $filename = $singleFile->getClientOriginalName();
                $file_path = $custom_uri . '/' . $event->id . '/' . Str::random(50) . '.' . $file_extension;

                // Upload file
                Storage::disk('public')->put($file_path, $singleFile);

                // Creating the database record for the file
                File::create([
                    'file_name' => trim($request->files_names[$key]) ?: $filename,
                    'file_url' => Storage::url($file_path),
                    'file_type' => $file_type,
                    'event_id' => $event->id
                ]);
            }
        }

        return response()->json(['status' => 'success', 'message' => 'Evénement ajouté avec succès.']);
    }

    /**
     * POST: Add an art
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function addArt(Request $request)
    {
        // Validate fields
        $request->validate([
            'art_name' => ['required', 'string', 'max:255'],
        ], [
            'art_name.required' => 'Le nom de l\'art est obligatoire.'
        ]);

        // Register art
        Art::create([
            'art_name' => $request->art_name,
            'art_description' => $request->art_description,
            'created_by' => Auth::user()->id,
        ]);

        return response()->json(['status' => 'success', 'message' => 'Art ajouté avec succès.']);
    }

    /**
     * POST: Add a message
     *
     * @param  \Illuminate\Http\Request  $request
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function addMessage(Request $request)
    {
        // Validate fields
        $request->validate([
            'message_content' => ['required', 'string', 'max:255'],
        ], [
            'message_content.required' => 'Le contenu du message est obligatoire.'
        ]);

        $user_id = null;

        if (!$request->filled('user_id')) {
            // Data validation
            $rules = [
                'firstname' => ['required', 'string', 'max:255'],
                'phone'     => ['required', 'string', 'max:45', 'unique:users'],
            ];

            $rules['phone'][] = 'unique:users';

            $request->validate($rules, [
                'firstname.required' => 'Le prénom est obligatoire.',
                'phone.required'     => 'Le n° de téléphone est obligatoire.',
            ]);

            $random_int_token = (string) random_int(1000000, 9999999);
            $random_string_password = (string) Str::random();

            // Register user
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'password'  => Hash::make($random_string_password),
            ]);

            PasswordReset::create([
                'phone'           => $request->phone,
                'token'           => $random_int_token,
                'former_password' => $random_string_password
            ]);

            // Rôle public
            $public_role = Role::firstOrCreate(
                ['role_name' => 'Public'],
                ['role_description' => 'Personne quelconque envoyant un commentaire ou un message à l\'administrateur']
            );

            $user->roles()->attach($public_role->id);

            $user_id = $user->id;
        }

        // Register message
        Message::create([
            'message_subject' => $request->message_subject,
            'message_content' => $request->message_content,
            'user_id' => !$request->filled('user_id') ? $user_id : $request->user_id
        ]);

        return response()->json(['status' => 'success', 'message' => 'Message envoyé avec succès.']);
    }

    /**
     * POST: Update some user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->with('error_message', 'Utilisateur non trouvé.');
        }

        // Preparing dynamic rules
        $rules = [];

        if ($request->has('firstname')) {
            $rules['firstname'] = ['required', 'string', 'max:255'];
        }

        if ($request->has('lastname')) {
            $rules['lastname'] = ['nullable', 'string', 'max:255'];
        }

        if ($request->has('surname')) {
            $rules['surname'] = ['nullable', 'string', 'max:255'];
        }

        if ($request->has('gender')) {
            $rules['gender'] = ['nullable', Rule::in(['M', 'F'])];
        }

        if ($request->has('birthdate')) {
            $rules['birthdate'] = ['nullable', 'date_format:d/m/Y'];
        }

        if ($request->has('p_o_box')) {
            $rules['p_o_box'] = ['nullable', 'string', 'max:255'];
        }

        if ($request->has('address_1')) {
            $rules['address_1'] = ['nullable', 'string'];
        }

        if ($request->has('address_2')) {
            $rules['address_2'] = ['nullable', 'string'];
        }

        if ($request->has('phone')) {
            $rules['phone'] = ['nullable', 'string', 'max:20'];
        }

        if ($request->has('email') && $request->input('email') !== $user->email) {
            $rules['email'] = ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)];
        }

        if ($request->has('username') && $request->input('username') !== $user->username) {
            $rules['username'] = ['required', 'string', 'max:45', Rule::unique('users')->ignore($user->id)];
        }

        if ($request->filled('password')) {
            $rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];
        }

        if ($request->has('image_64')) {
            $rules['image_64'] = ['required', 'string', 'starts_with:data:image/'];
        }

        // Validation of present fields only
        $validated = $request->validate($rules);

        // Date formatting
        if (isset($validated['birthdate'])) {
            $validated['birthdate'] = \Carbon\Carbon::createFromFormat('d/m/Y', $validated['birthdate'])->format('Y-m-d');
        }

        // Password hash if present
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Processing of the base64 image if present
        if (isset($validated['image_64'])) {
            $replace = substr($validated['image_64'], 0, strpos($validated['image_64'], ',') + 1);
            $image = str_replace($replace, '', $validated['image_64']);
            $image = str_replace(' ', '+', $image);

            $image_path = 'images/users/' . $user->id . '/avatar/' . Str::random(50) . '.png';

            Storage::disk('public')->put($image_path, base64_decode($image));

            $validated['avatar_url'] = Storage::url($image_path);

            unset($validated['image_64']);
        }

        // Update user with valid fields
        $user->update($validated);

        // Update PasswordReset only if necessary
        $password_reset = !empty($user->email)
            ? \App\Models\PasswordReset::where('email', $user->email)->first()
            : \App\Models\PasswordReset::where('phone', $user->phone)->first();

        if ($password_reset) {
            $updateData = [];

            if ($request->filled('email')) {
                $updateData['email'] = $request->email;
            }

            if ($request->filled('phone')) {
                $updateData['phone'] = $request->phone;
            }

            $updateData['token'] = (string) random_int(1000000, 9999999);

            $password_reset->update($updateData);
        }

        if ($request->filled('role_id')) {
            $user->roles()->syncWithoutDetaching([$request->role_id]);
        }

        return back()->with('success_message', 'Vos informations ont bien été mises à jour.');
    }

    /**
     * POST: Update user entity
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $entity
     * @param  int  $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function updateUserEntity(Request $request, $entity, $id)
    {
        if (!in_array($entity, ['roles', 'cart'])) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Il n\'y a aucun lien de ce genre.');
        }

        if ($entity == 'roles') {
            $role = Role::find($id);

            if (!$role) {
                return back()->with('error_message', 'Rôle non trouvé.');
            }

            // Preparing dynamic rules
            $rules = [];

            if ($request->has('role_name')) {
                $rules['role_name'] = ['required', 'string', 'max:255'];
            }

            if ($request->has('role_description')) {
                $rules['role_description'] = ['nullable', 'string', 'max:255'];
            }

            // Validation of present fields only
            $validated = $request->validate($rules);

            $validated['updated_by'] = Auth::user()->id;

            // Update role with valid fields
            $role->update($validated);

            return back()->with('success_message', 'Vos informations ont bien été mises à jour.');
        }
    }

    /**
     * POST: Update event
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function updateEvent(Request $request, $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Evénement non trouvé.');
        }

        // Preparing dynamic rules
        $rules = [];

        if ($request->has('event_title')) {
            $rules['event_title'] = ['required', 'string', 'max:255'];
        }

        if ($request->has('event_description')) {
            $rules['event_description'] = ['nullable', 'string'];
        }

        if ($request->has('start_at')) {
            $rules['start_at'] = ['nullable', 'string'];
        }

        if ($request->has('end_at')) {
            $rules['end_at'] = ['nullable', 'string'];
        }

        // Validation of present fields only
        $validated = $request->validate($rules);

        if ($request->filled('start_at')) {
            $parts = explode(' ', $request->start_at); // ['30/05/2025', '14:30']

            if (count($parts) === 2) {
                [$day, $month, $year] = explode('/', $parts[0]);
                $time = $parts[1];
                $validated['start_at'] = "$year-$month-$day $time:00"; // DATETIME format
            }
        }

        if ($request->filled('end_at')) {
            $parts = explode(' ', $request->end_at); // ['30/05/2025', '14:30']

            if (count($parts) === 2) {
                [$day, $month, $year] = explode('/', $parts[0]);
                $time = $parts[1];
                $validated['end_at'] = "$year-$month-$day $time:00"; // DATETIME format
            }
        }

        $rules['updated_by'] = Auth::id();

        // Update event with valid fields
        $event->update($validated);

        return back()->with('success_message', 'Evénement mis à jour.');
    }

    /**
     * POST: Update art
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function updateArt(Request $request, $id)
    {
        $art = Art::find($id);

        if (!$art) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Art non trouvé.');
        }

        // Preparing dynamic rules
        $rules = [];

        if ($request->has('message_subject')) {
            $rules['message_subject'] = ['required', 'string', 'max:255'];
        }

        if ($request->has('message_content')) {
            $rules['message_content'] = ['nullable', 'string'];
        }

        $rules['updated_by'] = Auth::id();

        // Validation of present fields only
        $validated = $request->validate($rules);

        // Update art with valid fields
        $art->update($validated);

        return back()->with('success_message', 'Message mis à jour.');
    }

    /**
     * POST: Update message
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @throws \Illuminate\Http\RedirectResponse
     */
    public function updateMessage(Request $request, $id)
    {
        $message = Message::find($id);

        if (!$message) {
            return redirect(RouteServiceProvider::HOME)->with('error_message', 'Message non trouvé.');
        }

        // Preparing dynamic rules
        $rules = [];

        if ($request->has('message_subject')) {
            $rules['message_subject'] = ['nullable', 'string', 'max:255'];
        }

        if ($request->has('message_content')) {
            $rules['message_content'] = ['required', 'string'];
        }

        if ($request->has('user_id')) {
            $rules['user_id'] = ['nullable', 'numeric'];
        }

        // Validation of present fields only
        $validated = $request->validate($rules);

        // Update message with valid fields
        $message->update($validated);

        return back()->with('success_message', 'Message mis à jour.');
    }
}
